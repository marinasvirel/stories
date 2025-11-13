@extends('layouts.main')
@section('title', 'Интересные истории | Добавить историю')
@section('content')
<h2>{{ $post->title }}</h2>
<a href="{{ url()->previous() }}">назад</a>
@endsection