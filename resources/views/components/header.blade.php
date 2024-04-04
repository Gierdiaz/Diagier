<header class='bg-cyan-500'>
    <div class="max-w-screen-custom-xl py-4 text-white flex justify-between mx-auto w-11/12">
        <h1 class='text-5xl font-eczar font-semibold'><a href="{{ route('main') }}">Diagier</a></h1>

        <nav class="items-center justify-end space-x-1 text-xl font-semibold hidden md:flex lg:space-x-2"
            id="headerContent">
            @auth
                <a href="{{ route('developers.index') }}">Desenvolvedores</a>
                <a href="{{ route('projects.index') }}">Projetos</a>
                <a href="{{ route('tasks.index') }}">Tarefas</a>
                <a href="{{ route('feedbacks.index') }}">Feedbacks</a>
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}" class='hover:text-cyan-600'>Login</a>
                <a href="{{ route('register') }}"
                    class='p-2 border-3 hover:bg-white hover:text-cyan-600 hover:border-cyan-600'>Register</a>
            @endauth
            <img src="{{ asset('img/close-square.svg') }}" alt="" class="w-8 absolute top-8 right-8 hidden"
                id='closeModal'>
        </nav>

        <img src="{{ asset('img/hamburguer-menu.svg') }}" alt="" class="w-8 md:hidden" id='openModal'>
    </div>

</header>
