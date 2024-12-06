<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Test Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <p>Dear {{ $firstName }} {{ $lastName }},</p>

    <p>We’re excited to inform you that your details have been successfully verified! 🎉</p>
    
    <p>Now it’s time to take the next step—your eligibility test. This short test is designed to help us understand your potential and guide you toward the best path to success.</p>
    
    <p><strong>👉 Click here to take your test:</strong> <a href="{{ $paymentLink }}" target="_blank">{{ $paymentLink }}</a></p>

    <p>Please make sure to complete the test within the next 48 hours. If you have any questions or face any issues, feel free to reach out to us.</p>

    <p>We can’t wait to see you ace this step and move closer to achieving your dreams with Finxl Business School!</p>

    <p>Best of luck!</p>

    <p>Warm regards,<br>
    Team Finxl Business School<br>
    Your Partner in Success</p>
</body>
</html>
