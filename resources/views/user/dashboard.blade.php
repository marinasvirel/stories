@extends('layouts.main')
@section('title', 'Интересные истории | Модерация')
@section('content')
Список неопубликованных историй
<x-stories :posts="$posts" link-prefix="moderation/post/"/>
@endsection