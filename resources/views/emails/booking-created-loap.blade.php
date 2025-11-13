<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Received - DHOA Portal</title>
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
            background: linear-gradient(135deg, #2E6EAC 0%, #1E4A7A 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .booking-details {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #F58634;
        }
        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #F58634;
        }
        .earnings {
            font-size: 20px;
            font-weight: bold;
            color: #28a745;
        }
        .button {
            display: inline-block;
            background: #F58634;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
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
        <h1>New Booking Received!</h1>
        <p>Someone wants to book your billboard</p>
    </div>

    <div class="content">
        <h2>Hello {{ $loap->name }},</h2>
        
        <p>Great news! You have received a new booking for your billboard <strong>"{{ $billboard->title }}"</strong>.</p>

        <div class="booking-details">
            <h3>Booking Details</h3>
            <p><strong>Advertiser:</strong> {{ $advertiser->name }}</p>
            <p><strong>Email:</strong> {{ $advertiser->email }}</p>
            <p><strong>Billboard:</strong> {{ $billboard->title }}</p>
            <p><strong>Location:</strong> {{ $billboard->location }}, {{ $billboard->city }}, {{ $billboard->state }}</p>
            <p><strong>Campaign Period:</strong> {{ \Carbon\Carbon::parse($booking->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') }}</p>
            <p><strong>Duration:</strong> {{ \Carbon\Carbon::parse($booking->start_date)->diffInDays($booking->end_date) + 1 }} days</p>
            <p><strong>Total Amount:</strong> <span class="amount">₦{{ number_format($booking->total_amount) }}</span></p>
            <p><strong>Your Earnings (90%):</strong> <span class="earnings">₦{{ number_format($booking->total_amount * 0.9) }}</span></p>
        </div>

        <p><strong>What happens next:</strong></p>
        <ul>
            <li>The advertiser will complete their payment</li>
            <li>Once payment is confirmed, you'll receive another notification</li>
            <li>Your earnings will be transferred to your account within 24-48 hours</li>
            <li>You'll receive email notifications for all payment updates</li>
        </ul>

        <div style="text-align: center;">
            <a href="{{ route('loap.dashboard') }}" class="button">View Dashboard</a>
        </div>

        <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>

        <div class="footer">
            <p>Thank you for being part of DHOA Portal!</p>
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
