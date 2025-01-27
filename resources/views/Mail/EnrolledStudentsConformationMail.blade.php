<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Finxl Business School</title>
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
        <div class="header">
            <h1>🎉 Welcome to Finxl Business School!</h1>
        </div>
        <div class="content">
            <p>Dear {{ $student->name }},</p>
            <p>Congratulations! We’re thrilled to announce that you’ve successfully completed all the steps and are now officially enrolled at Finxl Business School! 🚀</p>
            <p>This is the beginning of an exciting journey filled with growth, learning, and endless opportunities. Our team is here to support you every step of the way as you work toward achieving your dreams.</p>
            <p>Stay tuned for further updates, including your class schedule, course materials, and more. If you have any questions, feel free to reach out to us—we’re just an email or call away.</p>
            <p>Welcome aboard! We can’t wait to see all the amazing things you’ll accomplish with us.</p>
            <p>Warm regards,</p>
            <p><strong>Team Finxl Business School</strong><br>Your Partner in Success</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Finxl Business School. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
