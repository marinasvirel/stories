@extends('layouts.main')
@section('title', $post->title)
@section('content')
<x-story :post="$post"/>
<form action="" method="post">
  @csrf
  <button type="submit" name="action" value="publish">Опубликовать</button>
  <button type="submit" name="action" value="reject">Отклонить</button>
</form>
@endsection