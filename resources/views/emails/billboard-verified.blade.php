<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billboard Verified - DHOA Portal</title>
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
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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
        .billboard-details {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #28a745;
        }
        .button {
            display: inline-block;
            background: #28a745;
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
        <h1>🎉 Billboard Verified!</h1>
        <p>Your billboard is now live and ready for bookings</p>
    </div>

    <div class="content">
        <h2>Congratulations {{ $loap->name }}!</h2>
        
        <p>Great news! Your billboard <strong>"{{ $billboard->title }}"</strong> has been verified and is now live on the DHOA Portal platform.</p>

        <div class="billboard-details">
            <h3>Billboard Details</h3>
            <p><strong>Title:</strong> {{ $billboard->title }}</p>
            <p><strong>Type:</strong> {{ $billboard->type }}</p>
            <p><strong>Size:</strong> {{ $billboard->size }}</p>
            <p><strong>Location:</strong> {{ $billboard->location }}, {{ $billboard->city }}, {{ $billboard->state }}</p>
            <p><strong>Price per Day:</strong> ₦{{ number_format($billboard->price_per_day) }}</p>
            <p><strong>Status:</strong> <span style="color: #28a745; font-weight: bold;">✓ Verified & Active</span></p>
        </div>

        <p><strong>What this means for you:</strong></p>
        <ul>
            <li>Your billboard is now visible to advertisers on the platform</li>
            <li>Advertisers can browse and book your billboard</li>
            <li>You'll receive notifications when someone books your billboard</li>
            <li>You'll earn 90% of each booking payment</li>
            <li>Earnings will be transferred to your account within 24-48 hours</li>
        </ul>

        <div style="text-align: center;">
            <a href="{{ route('loap.billboards') }}" class="button">Manage Your Billboards</a>
        </div>

        <p><strong>Tips to maximize your earnings:</strong></p>
        <ul>
            <li>Keep your billboard in good condition</li>
            <li>Respond quickly to booking inquiries</li>
            <li>Consider seasonal pricing adjustments</li>
            <li>Add high-quality images to attract more advertisers</li>
        </ul>

        <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>

        <div class="footer">
            <p>Thank you for being part of DHOA Portal!</p>
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
