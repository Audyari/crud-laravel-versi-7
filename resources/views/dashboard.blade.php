<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    @if(Auth::check() && Auth::user()->role === 'admin')
        <h1>Welcome, Admin!</h1>
        <p>This is the admin dashboard.</p>
        <!-- Konten khusus admin -->
    @else
        <h1>Welcome, User!</h1>
        <p>This is the user dashboard.</p>
        <!-- Konten khusus user -->
    @endif
</body>
</html>