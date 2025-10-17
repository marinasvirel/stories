@extends('layouts.main')
@section('title', 'Интересные истории | Авторизация')
@section('content')
<form action="{{ route('authenticate') }}" method="post">
  @csrf
  <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
  @error('email')
  <p>{{ $message }}</p>
  @enderror
  <input type="password" name="password" placeholder="Пароль">
  @error('password')
  <p>{{ $message }}</p>
  @enderror
  <button type="submit">Авторизация</button>
</form>
@endsection