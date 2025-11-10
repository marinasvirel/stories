@extends('layouts.main')
@section('title', 'Интересные истории | Главная')
@section('content')
<h1>Интересные истории</h1>
@foreach ($posts as $post)
<h2>{{ $post->title }}</h2>
<p>{{ $post->text }}</p>
@endforeach

@endsection