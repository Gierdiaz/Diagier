<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title ?? 'Diagier'}}</title>
  @vite('resources/css/app.css')
</head>

<body>

  <main>
    <section class="block lg:grid grid-cols-[1fr_max(525px)] h-screen">
      <div class="hidden lg:block bg-center" style="background-image: url('img/sign-bg.png');"></div>
      <div class="bg-neutral-100 h-screen pt-16 lg:pt-24 px-4 lg:px-8">
        {{ $slot }}
      </div>
    </section>
  </main>

</body>

</html>