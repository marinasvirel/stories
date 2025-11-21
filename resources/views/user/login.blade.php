@extends('layouts.main')
@section('title', 'Интересные истории | Авторизация')
@section('content')
<form class="create-post" action="{{ route('authenticate') }}" method="post">
  @csrf
  <label for="author_name">Ваш email</label>
  <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" autofocus>
  <div class="error-box">
    @error('email')
    {{ $message }}
    @enderror
  </div>
  <label for="author_name">Ваш пароль</label>
  <input type="password" name="password" placeholder="Пароль">
  <div class="error-box">
    @error('password')
    {{ $message }}
    @enderror
  </div>
  <button type="submit">Авторизация</button>
</form>
@endsection