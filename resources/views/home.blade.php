@extends('layouts.main')
@section('title', 'Интересные истории | Главная')
@section('content')
<h1>Интересные истории</h1>
<ul class="stories-tags">
  @foreach($tags as $tag)
  <li class="stories-tags-item">
    <a href="{{ route('showByTag', ['tag' => $tag->name ]) }}">
      {{ $tag->name }}
    </a>
  </li>
  @endforeach
</ul>
<x-stories :posts="$posts" link-prefix="post/" />
@endsection