<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Received - Billboard Booking Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2196F3;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 5px 5px;
        }
        .booking-details {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #2196F3;
        }
        .commission-breakdown {
            background-color: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>💰 Payment Received!</h1>
        <p>Your billboard has been booked and payment processed</p>
    </div>
    
    <div class="content">
        <h2>Hello {{ $loap->name }},</h2>
        
        <p>Excellent news! Your billboard has been successfully booked and payment has been processed. Here are the details of your earnings.</p>
        
        <div class="booking-details">
            <h3>Booking Details</h3>
            <p><strong>Billboard:</strong> {{ $billboard->title }}</p>
            <p><strong>Location:</strong> {{ $billboard->location }}, {{ $billboard->city }}</p>
            <p><strong>Advertiser:</strong> {{ $advertiser->name }} ({{ $advertiser->email }})</p>
            <p><strong>Campaign Period:</strong> {{ $booking->start_date->format('M d, Y') }} - {{ $booking->end_date->format('M d, Y') }}</p>
            <p><strong>Duration:</strong> {{ $booking->duration_days }} days</p>
            <p><strong>Payment Reference:</strong> {{ $booking->payment_reference }}</p>
            <p><strong>Payment Date:</strong> {{ $booking->paid_at->format('M d, Y H:i') }}</p>
            
            @if($booking->campaign_details)
            <p><strong>Campaign Details:</strong> {{ $booking->campaign_details }}</p>
            @endif
        </div>
        
        <div class="commission-breakdown">
            <h3>💰 Earnings Breakdown</h3>
            <p><strong>Total Booking Amount:</strong> <span class="amount">₦{{ number_format($booking->total_amount, 2) }}</span></p>
            <p><strong>Your Earnings (90%):</strong> <span class="amount">₦{{ number_format($booking->loap_amount, 2) }}</span></p>
            <p><strong>Platform Commission (10%):</strong> ₦{{ number_format($booking->company_commission, 2) }}</p>
            
            @if($booking->transfer_status === 'completed')
            <p><strong>Transfer Status:</strong> <span style="color: #4CAF50;">✅ Completed</span></p>
            <p><strong>Transferred At:</strong> {{ $booking->transferred_at->format('M d, Y H:i') }}</p>
            @elseif($booking->transfer_status === 'initiated')
            <p><strong>Transfer Status:</strong> <span style="color: #FF9800;">⏳ Processing</span></p>
            @else
            <p><strong>Transfer Status:</strong> <span style="color: #666;">⏳ Pending</span></p>
            @endif
        </div>
        
        <p>Your billboard is now displaying the advertiser's content. You can monitor your bookings and earnings through your LOAP dashboard.</p>
        
        <p>If you have any questions about this booking or need assistance, please contact our support team.</p>
        
        <p>Thank you for being part of the DHOA Portal community!</p>
        
        <p>Best regards,<br>
        The DHOA Portal Team</p>
    </div>
    
    <div class="footer">
        <p>This is an automated message. Please do not reply to this email.</p>
        <p>© {{ date('Y') }} DHOA Portal. All rights reserved.</p>
    </div>
</body>
</html>
