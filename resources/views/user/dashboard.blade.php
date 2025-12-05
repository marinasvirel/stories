@extends('layouts.main')
@section('title', 'Модерация')
@section('content')
Список неопубликованных историй
<x-stories :posts="$posts" route-name="moderation"/>
@endsection