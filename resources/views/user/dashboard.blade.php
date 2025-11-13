@extends('layouts.main')
@section('title', 'Интересные истории | Модерация')
@section('content')
Список неопубликованных историй

@foreach ($posts as $post)
<h2>{{ $post->title }}</h2>
<p>{{ $post->text }}</p>
<img src="{{ asset('storage/' . $post->img) }}" alt="{{ $post->name }}">
<img src="{{ $post->img }}" alt="img">
<ul>
  @foreach($post->tags as $tag)
  <li>{{ $tag->name }}</li>
  @endforeach
</ul>
<a href="moderation/post/{{ $post->id }}" class="main-link">Читать</a>
@endforeach

@endsection