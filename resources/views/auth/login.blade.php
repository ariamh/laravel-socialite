<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="icon" href="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img class="logo" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2>Sign in to your account</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="actions">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a class="forgot-password" href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
            <button type="submit" class="submit-btn">Sign in</button>
        </form>
        <div class="divider"><span>Or continue with</span></div>
        <div class="social-login">
            <a href="{{ url('auth/google') }}">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google">
                Google
            </a>
            {{-- <a href="{{ url('auth/github') }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg" alt="GitHub">
                GitHub
            </a> --}}
        </div>
    </div>
</body>
</html>
