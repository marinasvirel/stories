@extends('layouts.main')
@section('title', 'Модерация')
@section('content')
Список неопубликованных историй
<x-stories :posts="$posts" link-prefix="moderation/post/"/>
@endsection