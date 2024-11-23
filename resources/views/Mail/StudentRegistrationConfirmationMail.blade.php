<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Confirmation</title>
</head>
<body>
    <p>Dear {{ $firstName }} {{ $lastName }},</p>

    <p>Congratulations on starting your journey with Finxl Business School! 🚀</p>

    <p>We’re thrilled to have you onboard. To proceed and take the next big step – <strong>completing your exam</strong> – we kindly request you to complete a nominal payment of ₹200.</p>

    <p>👉 <a href="{{ $paymentLink }}">Make your payment here</a></p>

    <p>Once your payment is confirmed, you will receive access to the exam link.</p>

    <p>This is your moment to shine, and we’re excited to see you succeed! If you have any questions or need assistance, feel free to contact us.</p>

    <p>Best of luck!</p>
    <p>Warm regards,</p>
    <p><strong>Team Finxl Business School</strong></p>
    <p>Your Partner in Success</p>
</body>
</html>
