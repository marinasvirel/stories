@extends('layouts.main')
@section('title', 'Интересные истории | Добавить историю')
@section('content')
<h2>{{ $post->title }}</h2>
<span class="story-author">{{ $post->author_name }}</span>
<a href="{{ url()->previous() }}">назад</a>
@endsection