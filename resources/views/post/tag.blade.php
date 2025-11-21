@extends('layouts.main')
@section('title', 'Интересные истории | Тег')
@section('content')
<x-stories :posts="$posts" link-prefix="post/" />
@endsection