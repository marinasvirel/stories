<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Интересные истории')</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
  <header>
    <div class="container container-space">
      <a href="{{ route('home') }}" class="logo-link">
        <img src="{{ asset('logo.png') }}" alt="logo">
      </a>
      <a href="{{ route('createView') }}" class="header-link">Добавить историю</a>
    </div>
  </header>
  <main>
    <div class="container">
      @yield('content')
    </div>
  </main>
  <footer>
    <div class="container container-space">
      <span class="creator">© Зинченко Марина, 2025</span>
      @auth
      <a href="{{ route('logout') }}" class="footer-link">Выход для модератора</a>
      <a href="{{ route('readModer') }}" class="footer-link">Админка</a>
      @endauth
      @guest
      <a href="{{ route('login') }}" class="footer-link">Вход для модератора</a>
      @endguest
      <img src="{{ asset('footer-img.png') }}" class="footer-link" alt="footer-img">
    </div>
  </footer>
</body>

</html>