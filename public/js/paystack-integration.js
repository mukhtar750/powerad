// Paystack Integration for DHOA Portal
class PaystackIntegration {
    constructor(publicKey) {
        this.publicKey = publicKey;
        this.isScriptLoaded = false;
        this.loadPaystackScript();
    }

    async loadPaystackScript() {
        return new Promise((resolve, reject) => {
            // Check if script is already loaded
            if (window.PaystackPop) {
                this.isScriptLoaded = true;
                resolve();
                return;
            }

            // Check if script is already being loaded
            if (document.querySelector('script[src*="paystack"]')) {
                // Wait for script to load
                const checkScript = setInterval(() => {
                    if (window.PaystackPop) {
                        this.isScriptLoaded = true;
                        clearInterval(checkScript);
                        resolve();
                    }
                }, 100);
                return;
            }

            // Load the script
            const script = document.createElement('script');
            script.src = 'https://js.paystack.co/v1/inline.js';
            script.async = true;
            
            script.onload = () => {
                this.isScriptLoaded = true;
                resolve();
            };
            
            script.onerror = () => {
                reject(new Error('Failed to load Paystack script'));
            };
            
            document.head.appendChild(script);
        });
    }

    async initializePayment(paymentData) {
        try {
            // Ensure Paystack script is loaded
            if (!this.isScriptLoaded) {
                await this.loadPaystackScript();
            }

            const response = await fetch('/payment/initialize', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(paymentData)
            });

            const result = await response.json();

            if (result.success) {
                await this.openPaystackModal(result);
                return result;
            } else {
                throw new Error(result.message || 'Payment initialization failed');
            }
        } catch (error) {
            console.error('Payment initialization error:', error);
            this.showError(error.message);
            throw error;
        }
    }

    async openPaystackModal(paymentData) {
        if (!window.PaystackPop) {
            throw new Error('Paystack script not loaded');
        }

        const handler = PaystackPop.setup({
            key: this.publicKey,
            email: paymentData.email || '',
            amount: paymentData.amount * 100, // Convert to kobo
            ref: paymentData.reference,
            callback: (response) => {
                this.handlePaymentSuccess(response);
            },
            onClose: () => {
                this.handlePaymentClose();
            }
        });

        handler.openIframe();
    }

    handlePaymentSuccess(response) {
        console.log('Payment successful:', response);
        this.showSuccess('Payment successful! Redirecting...');
        
        // Redirect to callback URL
        setTimeout(() => {
            window.location.href = `/payment/callback?reference=${response.reference}`;
        }, 2000);
    }

    handlePaymentClose() {
        console.log('Payment modal closed');
        this.showInfo('Payment cancelled by user');
    }

    showSuccess(message) {
        this.showNotification(message, 'success');
    }

    showError(message) {
        this.showNotification(message, 'error');
    }

    showInfo(message) {
        this.showNotification(message, 'info');
    }

    showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <span class="notification-message">${message}</span>
                <button class="notification-close">&times;</button>
            </div>
        `;

        // Add styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            padding: 15px 20px;
            border-radius: 5px;
            color: white;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            max-width: 400px;
            animation: slideIn 0.3s ease-out;
        `;

        // Set background color based on type
        const colors = {
            success: '#4CAF50',
            error: '#f44336',
            info: '#2196F3'
        };
        notification.style.backgroundColor = colors[type] || colors.info;

        // Add to page
        document.body.appendChild(notification);

        // Auto remove after 5 seconds
        setTimeout(() => {
            notification.remove();
        }, 5000);

        // Close button functionality
        notification.querySelector('.notification-close').addEventListener('click', () => {
            notification.remove();
        });
    }

    // Utility method to format currency
    formatCurrency(amount) {
        return new Intl.NumberFormat('en-NG', {
            style: 'currency',
            currency: 'NGN'
        }).format(amount);
    }

    // Method to calculate commission breakdown
    calculateCommissionBreakdown(totalAmount) {
        const companyCommission = totalAmount * 0.10; // 10%
        const loapAmount = totalAmount * 0.90; // 90%
        
        return {
            totalAmount,
            companyCommission,
            loapAmount,
            formattedTotal: this.formatCurrency(totalAmount),
            formattedCommission: this.formatCurrency(companyCommission),
            formattedLoapAmount: this.formatCurrency(loapAmount)
        };
    }
}

// Usage example:
document.addEventListener('DOMContentLoaded', function() {
        // Initialize Paystack integration
        const paystack = new PaystackIntegration('pk_test_d7bb6047eaa7b259e020785e6790136b7badb088');
    
    // Example booking form submission
    const bookingForm = document.getElementById('booking-form');
    if (bookingForm) {
        bookingForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const paymentData = {
                billboard_id: formData.get('billboard_id'),
                email: formData.get('email'),
                start_date: formData.get('start_date'),
                end_date: formData.get('end_date'),
                campaign_details: formData.get('campaign_details')
            };

            try {
                const result = await paystack.initializePayment(paymentData);
                console.log('Payment initialized:', result);
            } catch (error) {
                console.error('Payment failed:', error);
            }
        });
    }

    // Example commission calculation display
    const totalAmountInput = document.getElementById('total-amount');
    if (totalAmountInput) {
        totalAmountInput.addEventListener('input', function() {
            const amount = parseFloat(this.value) || 0;
            const breakdown = paystack.calculateCommissionBreakdown(amount);
            
            // Update commission display
            document.getElementById('company-commission').textContent = breakdown.formattedCommission;
            document.getElementById('loap-amount').textContent = breakdown.formattedLoapAmount;
        });
    }
});

// CSS for notifications
const notificationStyles = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    .notification-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .notification-close {
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-left: 10px;
    }
    
    .notification-close:hover {
        opacity: 0.8;
    }
`;

// Add styles to page
const styleSheet = document.createElement('style');
styleSheet.textContent = notificationStyles;
document.head.appendChild(styleSheet);
