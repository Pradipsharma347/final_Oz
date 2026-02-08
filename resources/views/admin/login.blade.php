<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/adminlogin.css') }}">
</head>
<body>

    <div class="login-image">
        <div class="image-text">
            <h1>Admin Pannel</h1>
            <p>Secure Admin Dashboard Access</p>
        </div>
    </div>

    <div class="login-wrapper">
        <div class="login-box">
            <h2>Admin Login</h2>
           

            @if($errors->any())
                <div class="error-msg">
                    <span style="margin-right:8px;">⚠️</span> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="admin@example.com" required>
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit">Sign In</button>
            </form>

            <div class="login-footer">
                © {{ date('Y') }} Admin Panel System
            </div>
        </div>
    </div>

</body>
</html>

