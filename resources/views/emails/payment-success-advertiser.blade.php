<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Successful - Billboard Booking Confirmed</title>
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
            background-color: #4CAF50;
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
            color: #4CAF50;
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
        <h1>🎉 Payment Successful!</h1>
        <p>Your billboard booking has been confirmed</p>
    </div>
    
    <div class="content">
        <h2>Hello {{ $advertiser->name }},</h2>
        
        <p>Great news! Your payment for the billboard booking has been processed successfully. Your campaign is now active and ready to go.</p>
        
        <div class="booking-details">
            <h3>Booking Details</h3>
            <p><strong>Billboard:</strong> {{ $billboard->title }}</p>
            <p><strong>Location:</strong> {{ $billboard->location }}, {{ $billboard->city }}</p>
            <p><strong>Campaign Period:</strong> {{ $booking->start_date->format('M d, Y') }} - {{ $booking->end_date->format('M d, Y') }}</p>
            <p><strong>Duration:</strong> {{ $booking->duration_days }} days</p>
            <p><strong>Total Amount Paid:</strong> <span class="amount">₦{{ number_format($booking->total_amount, 2) }}</span></p>
            <p><strong>Payment Reference:</strong> {{ $booking->payment_reference }}</p>
            <p><strong>Payment Date:</strong> {{ $booking->paid_at->format('M d, Y H:i') }}</p>
            
            @if($booking->campaign_details)
            <p><strong>Campaign Details:</strong> {{ $booking->campaign_details }}</p>
            @endif
        </div>
        
        <p>Your billboard advertisement is now live! You can track your campaign performance through your advertiser dashboard.</p>
        
        <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>
        
        <p>Thank you for choosing DHOA Portal for your advertising needs!</p>
        
        <p>Best regards,<br>
        The DHOA Portal Team</p>
    </div>
    
    <div class="footer">
        <p>This is an automated message. Please do not reply to this email.</p>
        <p>© {{ date('Y') }} DHOA Portal. All rights reserved.</p>
    </div>
</body>
</html>
