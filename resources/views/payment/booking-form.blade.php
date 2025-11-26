<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billboard Booking</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .booking-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }
        .commission-breakdown {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #4CAF50;
        }
        .commission-item {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            padding: 5px 0;
        }
        .commission-item.total {
            border-top: 2px solid #ddd;
            padding-top: 15px;
            font-weight: bold;
            font-size: 18px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        .billboard-info {
            background-color: #e3f2fd;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .billboard-title {
            font-size: 24px;
            font-weight: bold;
            color: #1976d2;
            margin-bottom: 10px;
        }
        .billboard-details {
            color: #666;
            line-height: 1.6;
        }
        .price-display {
            font-size: 20px;
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    @php($billboard = isset($billboard) ? $billboard : \App\Models\Billboard::find(request()->route('billboard')))
    <div class="booking-container">
        <h1>Book Billboard Advertisement</h1>
        
        <!-- Billboard Information -->
        <div class="billboard-info">
            <div class="billboard-title" id="billboard-title">{{ $billboard->title }}</div>
            <div class="billboard-details">
                <p><strong>Location:</strong> <span id="billboard-location">{{ $billboard->address ?? ($billboard->location ?: ($billboard->city.', '.$billboard->state)) }}</span></p>
                <p><strong>Size:</strong> <span id="billboard-size">{{ $billboard->size }}</span></p>
                <p><strong>Type:</strong> <span id="billboard-type">{{ $billboard->type }}</span></p>
                <p><strong>Price per day:</strong> <span class="price-display" id="daily-price">₦{{ number_format((float)$billboard->price_per_day, 0) }}</span></p>
            </div>
        </div>

        <form id="booking-form">
            <input type="hidden" name="billboard_id" id="billboard_id" value="{{ $billboard->id }}">
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required value="{{ auth()->user()->email }}" readonly>
            </div>

            <div class="form-group">
                <label for="start_date">Campaign Start Date</label>
                <input type="date" name="start_date" id="start_date" required>
            </div>

            <div class="form-group">
                <label for="end_date">Campaign End Date</label>
                <input type="date" name="end_date" id="end_date" required>
            </div>

            <div class="form-group">
                <label for="campaign_details">Campaign Details (Optional)</label>
                <textarea name="campaign_details" id="campaign_details" rows="4" placeholder="Describe your campaign, target audience, or any special requirements..."></textarea>
            </div>

            <!-- Commission Breakdown -->
            <div class="commission-breakdown">
                <h3>💰 Payment Breakdown</h3>
                <div class="commission-item">
                    <span>Total Booking Amount:</span>
                    <span id="total-amount-display">₦0.00</span>
                </div>
                <div class="commission-item">
                    <span>Your Payment:</span>
                    <span id="total-amount">₦0.00</span>
                </div>
                <div class="commission-item">
                    <span>Platform Commission (10%):</span>
                    <span id="company-commission">₦0.00</span>
                </div>
                <div class="commission-item">
                    <span>Billboard Owner Earnings (90%):</span>
                    <span id="loap-amount">₦0.00</span>
                </div>
            </div>

            <button type="submit" class="btn" id="pay-button">
                💳 Pay with Paystack
            </button>
        </form>
    </div>

    <!-- Include Paystack Script -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="/js/paystack-integration.js"></script>
    
    <script>
        // Set minimum date to tomorrow
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        document.getElementById('start_date').min = tomorrow.toISOString().split('T')[0];

        // Update end date minimum when start date changes
        document.getElementById('start_date').addEventListener('change', function() {
            const startDate = new Date(this.value);
            startDate.setDate(startDate.getDate() + 1);
            document.getElementById('end_date').min = startDate.toISOString().split('T')[0];
        });

        // Calculate total amount when dates change
        function calculateTotal() {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            const dailyPrice = {{ (float)($billboard->price_per_day ?? 0) }};

            if (startDate && endDate) {
                const start = new Date(startDate);
                const end = new Date(endDate);
                const durationDays = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) + 1;
                const totalAmount = dailyPrice * durationDays;

                // Update displays
                document.getElementById('total-amount-display').textContent = new Intl.NumberFormat('en-NG', {
                    style: 'currency',
                    currency: 'NGN'
                }).format(totalAmount);

                document.getElementById('total-amount').textContent = new Intl.NumberFormat('en-NG', {
                    style: 'currency',
                    currency: 'NGN'
                }).format(totalAmount);

                document.getElementById('company-commission').textContent = new Intl.NumberFormat('en-NG', {
                    style: 'currency',
                    currency: 'NGN'
                }).format(totalAmount * 0.10);

                document.getElementById('loap-amount').textContent = new Intl.NumberFormat('en-NG', {
                    style: 'currency',
                    currency: 'NGN'
                }).format(totalAmount * 0.90);
            }
        }

        document.getElementById('start_date').addEventListener('change', calculateTotal);
        document.getElementById('end_date').addEventListener('change', calculateTotal);

        // Initialize Paystack when page loads
        let paystack;
        document.addEventListener('DOMContentLoaded', function() {
            // Wait for Paystack script to load
            const initPaystack = () => {
                if (window.PaystackPop) {
                    paystack = new PaystackIntegration('{{ config('services.paystack.public_key') }}');
                    console.log('Paystack initialized successfully');
                } else {
                    setTimeout(initPaystack, 100);
                }
            };
            initPaystack();
        });
    </script>
</body>
</html>
