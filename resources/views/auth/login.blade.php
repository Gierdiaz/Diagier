<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Diagier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="particles-js"></div>

    <div class="container">
        <h2>Login</h2>

        @if(session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <label for="email">E-mail:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <button type="submit">Login</button>
        </form>

        <div class="redirect-links">
            <a href="{{ route('password.request') }}">Forgot password?</a>
            <span>|</span>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="{{ asset('js/particles.js') }}"></script>
</body>
</html>
