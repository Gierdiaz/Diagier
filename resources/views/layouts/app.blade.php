<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Sua Aplicação</title>
    <!-- Adicione seus estilos CSS, scripts, etc. aqui -->
</head>
<body>

    <!-- Menu Lateral -->
    <aside>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('projects.index') }}">Projetos</a>
                <ul>
                    <li><a href="{{ route('projects.tasks') }}">Tarefas</a></li>
                </ul>
            </li>
            <li><a href="{{ route('developers.index') }}">Desenvolvedores</a></li>
        </ul>
    </aside>

    <!-- Conteúdo Principal -->
    <main>
        @yield('content')
    </main>

    <!-- Adicione seus scripts JavaScript, se necessário -->

    <!-- Adicione seus estilos CSS, se necessário -->
</body>
</html>
