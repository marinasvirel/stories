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
<form class="create-post" action="" method="post" enctype="multipart/form-data">
  @csrf
  <label for="author_name">Ваше имя</label>
  <input type="text" name="author_name" placeholder="Саша" value="{{ old('name') }}" autocorrect autofocus>
  <label for="author_email">Ваш email</label>
  <input type="email" name="author_email" placeholder="sasha@mail.com" value="{{ old('email') }}">
  <label for="title">Заголовок</label>
  <input type="text" name="title" placeholder="Три кита" value="{{ old('title') }}">
  <label for="text">Текст</label>
  <textarea name="text" id="" autocorrect placeholder="Давным-давно..." rows="5"></textarea>
  <label for="img">Иллюстрация</label>
  <input name="img" type="file" accept="image/*">
  <label for="existing_tags">Выбрать существующие теги:</label>
  <select name="existing_tags[]" id="existing_tags" size="1" multiple>
    @foreach($tags as $tag)
    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
    @endforeach
  </select>
  <label for="new_tags">Добавить новые теги (через запятую):</label>
  <input type="text" name="new_tags" id="new_tags" placeholder="приключения, путешествия">
  <button type="submit">Добавить</button>
</form>
@endsection