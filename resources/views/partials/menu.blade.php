<nav class="navbar navbar-expand-lg" style="background-color: rgb(150, 95, 24); color: white; mb-5">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('main') }}">TechSphere</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('developers.index') }}">Desenvolvedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('projects.index') }}">Projetos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('tasks.index') }}">Tarefas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('feedbacks.index') }}">Feedbacks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">{{ Auth::user()->name }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>