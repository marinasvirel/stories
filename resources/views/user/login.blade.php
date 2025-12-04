@extends('layouts.main')
@section('title', 'Авторизация')
@section('content')
<form class="create-post" action="{{ route('authenticate') }}" method="post">
  @csrf
  <label for="author_name">Ваш email</label>
  <input type="text" name="email" id="author_name" placeholder="E-mail" value="{{ old('email') }}" autofocus>
  <div class="error-box">
    @error('email')
    {{ $message }}
    @enderror
  </div>
  <label for="password">Ваш пароль</label>
  <input type="password" name="password" id="password" placeholder="Пароль">
  <div class="error-box">
    @error('password')
    {{ $message }}
    @enderror
  </div>
  <button type="submit">Авторизация</button>
</form>
@endsection