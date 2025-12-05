@extends('layouts.main')
@section('title', 'Интересные истории')
@section('content')
<ul class="stories-tags">
  @foreach($tags as $tag)
  <li class="stories-tags-item">
    <a href="{{ route('showByTag', ['tag' => $tag->name ]) }}" class="footer-link">
      {{ $tag->name }}
    </a>
  </li>
  @endforeach
</ul>
<x-stories :posts="$posts" route-name="show" />
@endsection