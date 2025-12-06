@extends('layouts.main')
@section('title', 'Добавить историю')
@section('content')
@if (session('message'))
<div class="alert-message">
  {{ session('message') }}
</div>
@endif
<form class="create-post" action="" method="post" enctype="multipart/form-data">
  @csrf
  <label for="author_name">Ваше имя</label>
  <input type="text" name="author_name" id="author_name" placeholder="Саша" value="{{ old('author_name') }}" autocorrect autofocus>
  <div class="error-box">
    @error('author_name')
    {{ $message }}
    @enderror
  </div>
  <label for="author_email">Ваш email</label>
  <input type="text" name="author_email" id="author_email" placeholder="sasha@mail.com" value="{{ old('author_email') }}">
  <div class="error-box">
    @error('author_email')
    {{ $message }}
    @enderror
  </div>
  <label for="title">Заголовок</label>
  <input type="text" name="title" id="title" placeholder="Три кита" value="{{ old('title') }}">
  <div class="error-box">
    @error('title')
    {{ $message }}
    @enderror
  </div>
  <label for="text">Текст</label>
  <textarea name="text" id="text" autocorrect placeholder="Давным-давно..." rows="5"></textarea>
  <div class="error-box">
    @error('text')
    {{ $message }}
    @enderror
  </div>
  <label for="img">Иллюстрация</label>
  <input name="img" id="img" type="file" accept="image/*">
  <div class="error-box">
    @error('img')
    {{ $message }}
    @enderror
  </div>
  <label for="existing_tags">Выбрать существующие теги:</label>
  <select name="existing_tags[]" id="existing_tags" size="1" multiple>
    @foreach($tags as $tag)
    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
    @endforeach
  </select>
  <div class="error-box">
    @error('existing_tags')
    {{ $message }}
    @enderror
  </div>
  <label for="new_tags">Добавить новые теги (через запятую):</label>
  <input type="text" name="new_tags" id="new_tags" placeholder="приключения, путешествия">
  <div class="error-box">
    @error('new_tags')
    {{ $message }}
    @enderror
  </div>
  <button type="submit">Добавить</button>
</form>
@endsection