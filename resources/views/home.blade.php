@extends('layouts.main')
@section('title', 'Интересные истории | Главная')
@section('content')
<h1>Интересные истории</h1>
@if(isset($posts))
<x-stories :posts="$posts" link-prefix="post/"/>
@else
<p>Переменная $posts не определена в родительском шаблоне.</p>
@endif
@endsection