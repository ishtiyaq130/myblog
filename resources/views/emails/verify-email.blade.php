<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Hello {{ $users->name }},</h1>
    <p>Please click the following link to verify your email address:</p>
    <a href="{{ $verificationUrl }}">Verify Email</a>
</body>
</html>
