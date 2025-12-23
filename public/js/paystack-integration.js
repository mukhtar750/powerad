class FlutterwaveIntegration {
    constructor(publicKey) {
        this.publicKey = publicKey;
        this.isScriptLoaded = false;
        this.loadFlutterwaveScript();
    }

    async loadFlutterwaveScript() {
        return new Promise((resolve, reject) => {
            if (window.FlutterwaveCheckout) {
                this.isScriptLoaded = true;
                resolve();
                return;
            }

            if (document.querySelector('script[src*="flutterwave"]')) {
                const checkScript = setInterval(() => {
                    if (window.FlutterwaveCheckout) {
                        this.isScriptLoaded = true;
                        clearInterval(checkScript);
                        resolve();
                    }
                }, 100);
                return;
            }

            const script = document.createElement('script');
            script.src = 'https://checkout.flutterwave.com/v3.js';
            script.async = true;
            
            script.onload = () => {
                this.isScriptLoaded = true;
                resolve();
            };
            
            script.onerror = () => {
                reject(new Error('Failed to load Flutterwave script'));
            };
            
            document.head.appendChild(script);
        });
    }

    async initializePayment(paymentData) {
        try {
            if (!this.isScriptLoaded) {
                await this.loadFlutterwaveScript();
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
                await this.openFlutterwaveModal(result);
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

    async openFlutterwaveModal(paymentData) {
        if (!window.FlutterwaveCheckout) {
            throw new Error('Flutterwave script not loaded');
        }

        FlutterwaveCheckout({
            public_key: this.publicKey,
            tx_ref: paymentData.reference,
            amount: paymentData.amount,
            currency: 'NGN',
            customer: {
                email: paymentData.email || ''
            },
            callback: (response) => {
                this.handlePaymentSuccess(response, paymentData.reference);
            },
            onclose: () => {
                this.handlePaymentClose();
            }
        });
    }

    handlePaymentSuccess(response, reference) {
        console.log('Payment successful:', response);
        this.showSuccess('Payment successful! Redirecting...');
        
        setTimeout(() => {
            const txId = response.transaction_id || response.id || '';
            window.location.href = `/payment/callback?transaction_id=${txId}&reference=${reference}`;
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

    formatCurrency(amount) {
        return new Intl.NumberFormat('en-NG', {
            style: 'currency',
            currency: 'NGN'
        }).format(amount);
    }

    calculateCommissionBreakdown(totalAmount) {
        const companyCommission = totalAmount * 0.10;
        const loapAmount = totalAmount * 0.90;
        
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

// Integration usage should be handled in blade views with server-provided keys.

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
