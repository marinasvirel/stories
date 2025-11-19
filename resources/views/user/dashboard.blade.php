@extends('layouts.main')
@section('title', 'Интересные истории | Модерация')
@section('content')
Список неопубликованных историй
@if(isset($posts))
<x-stories :posts="$posts" link-prefix="moderation/post/"/>
@else
<p>Переменная $posts не определена в родительском шаблоне.</p>
@endif
@endsection