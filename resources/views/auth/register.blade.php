<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Diagier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="particles-js"></div>

    <div class="container">
        <h2>Register User</h2>

        @if(session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
        
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
            <label for="email">E-Mail</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
           
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        
        <div class="redirect-link">
            Already have an account?<a href="{{ route('login') }}"> Log in here</a>.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="{{ asset('js/particles.js') }}"></script>
</body>
</html>
