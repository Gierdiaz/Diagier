<div class="block lg:grid grid-rows-[125px,_1fr] max-h-screen">
  @include('layout.core.header')

  <main class="h-full overflow-y-scroll lg:p-16 xl:p-24">
    @yield('content')
  </main>
</div>