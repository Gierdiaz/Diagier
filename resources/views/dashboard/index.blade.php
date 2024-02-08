<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrativo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40; /* Cor do Menu */
        }

        .sidebar .brand-link {
            height: 56px;
            text-align: center;
            font-size: 24px;
            line-height: 56px;
            color: white;
        }

        .sidebar .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar .sidebar-menu li {
            position: relative;
        }

        .sidebar .sidebar-menu li>a {
            display: block;
            padding: 10px 15px;
            color: #b8c7ce; /* Cor do texto */
            text-decoration: none; /* Remover sublinhado */
            transition: background-color 0.3s; /* Adicionar transição de fundo */
        }

        .sidebar .sidebar-menu li>a:hover {
            color: #fff; /* Cor do texto ao passar o mouse */
            background-color: #adb5bd; /* Cor de fundo ao passar o mouse */
        }

        .sidebar .sidebar-menu .menu-header {
            padding: 10px 15px;
            background-color: #495057; /* Cor de fundo do cabeçalho do menu */
            color: #b8c7ce; /* Cor do texto do cabeçalho do menu */
            font-weight: bold;
            cursor: pointer; /* Adicionado para indicar que é clicável */
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .content h2 {
            color: #000; /* Preto */
        }

        .content p {
            color: #666; /* Cinza */
        }

        .hidden {
            display: none;
        }

        .nav-icon {
            margin-right: 10px;
        }

        ul {
            list-style: none;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="brand-link">AdminLTE</div>
    <ul class="sidebar-menu">
        <li class="menu-header" id="management-toggle">Management</li>
        <ul class="management-submenu hidden">
            <li><a href=" route {{ route('projects.index') }}"><i class="nav-icon fas fa-project-diagram"></i>Projects</a></li>
            <li><a href=" route {{ route('developers.index') }}"><i class="nav-icon fas fa-user"></i>Developers</a></li>
            <li><a href=" route {{ route('profiles.index') }}"><i class="nav-icon fas fa-users"></i>Users</a></li>
            <li><a href=" route {{ route('feedbacks.index') }}"><i class="nav-icon fas fa-comments"></i>Feedback</a></li>
            <li><a href=" route {{ route('tasks.index') }}"><i class="nav-icon fas fa-tasks"></i>Tasks</a></li>
        </ul>
    </ul>
</div>

<div class="content">
    <h2>Bem-vindo ao Dashboard Administrativo</h2>
    <p>Aqui você pode gerenciar projetos, desenvolvedores, usuários, feedbacks e tarefas.</p>
</div>

<script>
    const managementToggle = document.getElementById('management-toggle');
    const managementSubmenu = document.querySelector('.management-submenu');

    managementToggle.addEventListener('click', () => {
        managementSubmenu.classList.toggle('hidden');
    });
</script>

</body>
</html>
