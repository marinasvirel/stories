@extends('layouts.main')
@section('title', 'Интересные истории | Модерация')
@section('content')
Модерация
<h2>{{ $post->title }}</h2>
<form action="" method="post">
  @csrf
  <button type="submit" name="action" value="publish">Опубликовать</button>
  <button type="submit" name="action" value="reject">Отклонить</button>
</form>
@endsection