<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Verified – Your Test Awaits!</title>
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
        .button-container {
            text-align: center;
            margin: 20px 0;
        }
        .button {
            text-decoration: none;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }
        .button:hover {
            background-color: #0056b3;
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
        <div class="header">
        </div>
        <div class="content">
            <p>Dear {{ $firstName }} {{ $lastName }},</p>
            <p>We’re excited to inform you that your details have been successfully verified! 🎉</p>
            <p>Now it’s time to take the next step—your eligibility test. This short test is designed to help us understand your potential and guide you toward the best path to success.</p>
        </div>
        <div class="button-container">
            <a href="{{ $paymentLink }}" class="button" target="_blank">👉 Click here to take your test</a>
        </div>
        <div class="content">
            <p>Please make sure to complete the test by [deadline, if applicable]. If you have any questions or face any issues, feel free to reach out to us.</p>
            <p>We can’t wait to see you ace this step and move closer to achieving your dreams with Finxl Business School!</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Finxl Business School. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
