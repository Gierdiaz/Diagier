<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Desenvolvedor</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <h2>Detalhes do Desenvolvedor</h2>

        {{-- @can('view-developer-details', $developer) --}}
            <ul>
                <li><strong>Nome:</strong> {{ $developer->name }}</li>
                <li><strong>Email:</strong> {{ $developer->email }}</li>
                <li><strong>GitHub:</strong> {{ $developer->github }}</li>
                <li><strong>Bio:</strong> {{ $developer->bio }}</li>
                <li><strong>Tecnologias:</strong> {{ $developer->technologies }}</li>
                <li><strong>Faculdade:</strong> {{ $developer->college }}</li>
                <li><strong>Curso:</strong> {{ $developer->course }}</li>
                <li><strong>Certificações:</strong> {{ $developer->certifications }}</li>
                <li><strong>Empresa:</strong> {{ $developer->company }}</li>
                <li><strong>Nível:</strong> {{ $developer->level }}</li>
                <li><strong>Cidade:</strong> {{ $developer->city }}</li>
                <li><strong>Estado:</strong> {{ $developer->state }}</li>
                <li><strong>País:</strong> {{ $developer->country }}</li>
                <li><strong>Modo de Trabalho:</strong> {{ $developer->work_mode }}</li>
                <li><strong>Usuário:</strong> {{ $developer->profile->id }}</li>

                <a href="{{ route('developers.projects', ['developer' => $developer->id]) }}">Ver Projetos</a>
            </ul>
        {{-- @endcan --}}
    @endsection
</body>
</html>
