<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuário</title>
</head>
<body>
    <h2>Registrar Usuário</h2>

    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name">Nome:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        
        <label for="password">Senha:</label>
        <input type="password" name="password" required>

        <label for="password_confirmation">Confirmar Senha:</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
