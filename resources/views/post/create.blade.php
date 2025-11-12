@extends('layouts.main')
@section('title', 'Интересные истории | Добавить историю')
@section('content')
<div>
  @if($errors->any())
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
  @endif
</div>
<form action="" method="post" enctype="multipart/form-data">
  @csrf
  <input type="text" name="author_name" placeholder="Имя" value="{{ old('name') }}" autocorrect autofocus>
  <input type="email" name="author_email" placeholder="E-mail" value="{{ old('email') }}">
  <input type="text" name="title" placeholder="Заголовок" value="{{ old('title') }}">
  <textarea name="text" id="" autocorrect placeholder="Текст"></textarea>
  <input name="img" type="file" accept="image/*">
  <label for="existing_tags">Выбрать существующие теги:</label>
  <select name="existing_tags[]" id="existing_tags" multiple>
    @foreach($tags as $tag)
    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
    @endforeach
  </select>
  <label for="new_tags">Добавить новые теги (через запятую):</label>
  <input type="text" name="new_tags" id="new_tags" placeholder="например: php, laravel, js">
  <button type="submit">Добавить</button>
</form>
@endsection