@extends('layouts.main')
@section('title', 'Интересные истории | Главная')
@section('content')
<h1>Интересные истории</h1>
<x-stories :posts="$posts" link-prefix="post/" />
@endsection