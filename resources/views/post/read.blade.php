@extends('layouts.main')
@section('title', $post->title)
@section('content')
<x-story :post="$post"/>
@endsection