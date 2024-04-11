<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{$title ?? 'Diagier'}}</title>
  @vite('resources/css/app.css')
</head>

<body class="h-screen max-h-screen">
  @if(Route::is('tasks.index'))
    @include('layout.core.layout-full')
  @else
    @include('layout.core.layout-partial')
  @endif

</body>

</html>