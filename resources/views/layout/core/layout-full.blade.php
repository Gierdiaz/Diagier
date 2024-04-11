<div class="block lg:grid  grid-cols-[minmax(10vw,_250px)_1fr] h-full">
  @include('layout.core.project-management-aside')

  <div class="grid grid-rows-[125px,_1fr] max-h-screen">
    @include('layout.core.header')

    <main class="h-full overflow-y-scroll lg:p-16">
      @yield('content')
    </main>
  </div>
</div>