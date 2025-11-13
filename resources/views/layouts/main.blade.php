<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Интересные истории')</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <div class="container">
      <a href="{{ route('home') }}">Главная</a>
      <a href="{{ route('createView') }}">Добавить историю</a>
    </div>
  </header>
  <main>
    <div class="container">
      @yield('content')
    </div>
  </main>
  <footer>
    <div class="container">
      @auth
      <a href="{{ route('logout') }}">Выход для модератора</a>
      <a href="{{ route('readModer') }}">Админка</a>
      @endauth
      @guest
      <a href="{{ route('login') }}">Вход для модератора</a>
      @endguest
    </div>
  </footer>
</body>

</html>