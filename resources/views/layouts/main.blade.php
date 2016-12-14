<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Curso de Laravel</title>
    <!-- Esto es para el uso de versiones con nuestros assets -->
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
