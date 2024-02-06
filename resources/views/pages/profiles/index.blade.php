<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Perfis</title>
</head>
<body>
    <h2>Lista de Perfis</h2>

    @if(auth()->check())
        <p>Logado como: {{ auth()->user()->name }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <hr>
    @endif

    @if($profiles->isEmpty())
        <p>Nenhum perfil encontrado.</p>
    @else
        <ul>
            @foreach($profiles as $profile)
                <li>
                    <strong>Nome:</strong> {{ $profile->name }}<br>
                    <strong>Descrição:</strong> {{ $profile->description }}<br>
                    <a href="{{ route('developer.profile', ['profileId' => $profile->id]) }}">Ver detalhes do desenvolvedor</a>
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
</body>
</html>
