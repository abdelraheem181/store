{{-- resources/views/emails/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        
        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        
        .welcome-message {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        
        .content {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        
        .highlight {
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin: 20px 0;
        }
        
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
        
        .user-info {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">Book Store</div>
            <h1 class="welcome-message">Welcome aboard, {{ $userName }}!</h1>
        </div>

        <div class="content">
            <p>Hi <strong>{{ $userName }}</strong>,</p>
            
            <p>We're thrilled to have you join our community! Your account has been successfully created and you're now ready to explore all the amazing features we have to offer.</p>

            @if($customMessage)
                <div class="highlight">
                    <strong>Special Message:</strong><br>
                    {{ $customMessage }}
                </div>
            @endif

            <div class="user-info">
                <h3>Your Account Details:</h3>
                <p><strong>Name:</strong> {{ $userName }}</p>
                <p><strong>Email:</strong> {{ $userEmail }}</p>
                <p><strong>Registration Date:</strong> {{ now()->format('F j, Y') }}</p>
            </div>

            <p>Here's what you can do next:</p>
            <ul>
                <li>Complete your profile setup</li>
                <li>Explore our dashboard</li>
                <li>Connect with other users</li>
                <li>Check out our latest features</li>
            </ul>

            <div style="text-align: center;">
                <a href="{{ url('/dashboard') }}" class="button">Get Started</a>
            </div>
        </div>

        <div class="footer">
            <p>Thanks for choosing Book Store!</p>
            <p>If you have any questions, feel free to <a href="mailto:support@bookstore.com">contact our support team</a>.</p>
            <p>&copy; {{ date('Y') }} YourApp. All rights reserved.</p>
        </div>
    </div>
</body>
</html>