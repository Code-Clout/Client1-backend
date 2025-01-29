<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #2c3e50;
        }
        .content {
            text-align: left;
            font-size: 16px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="content">
            <p>Dear {{ $firstName }} {{ $lastName }},</p>
            <p>Thank you for taking the first step toward an exciting future with Finxl Business School! 🚀</p>
            <p>We’ve received your registration and payment of ₹500, and we’re thrilled to have you onboard. Our team is currently verifying your details, and we’ll be in touch with you very soon.</p>
            <p>As part of the next step, you’ll need to take a small test to assess your eligibility. Don’t worry—it’s just a simple step to ensure you’re on the right track toward success!</p>
            <p>Stay tuned, and get ready to begin this incredible journey with us. If you have any questions, feel free to reach out.</p>
        </div>
        <div class="footer">
            <p>Warm regards,</p>
            <p><strong>Team Finxl Business School</strong><br>Your Partner in Success</p>
        </div>
    </div>
</body>
</html>
