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
               <!-- <a href="{{ route('logout') }}">Logout</a> -->

                <!----------------------- DROPDOWN MENU -------------------------->
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="items-center justify-end space-x-1 text-xl font-semibold text-white bg-blue-450 hover:bg-blue-460 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:bg-blue-450 dark:hover:bg-blue-450 dark:focus:ring-blue-450" type="button">  {{ Auth::user()->name }} <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
                  </button>

                  <!-- Dropdown menu -->
                  <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                          <a href="{{ route('wait')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                          <a href="{{ route('settings')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                          <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
                        </li>
                      </ul>
                  </div>
                  <!---------------------------------------------------------->

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



