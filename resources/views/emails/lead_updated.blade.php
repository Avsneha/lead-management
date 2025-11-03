<!DOCTYPE html>
<html>
<head>
    <title>Lead Updated</title>
</head>
<body>
    <h2>Lead Updated Notification</h2>
    <p><strong>Name:</strong> {{ $lead->name }}</p>
    <p><strong>Email:</strong> {{ $lead->email }}</p>
    <p><strong>Phone:</strong> {{ $lead->phone }}</p>
    <p><strong>Status:</strong> {{ $lead->status }}</p>
    
    <hr>
    <p>This is an automated message from your Lead Management System.</p>
</body>
</html>
