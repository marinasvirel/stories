@extends('layouts.main')
@section('title', $tag)
@section('content')
<x-stories :posts="$posts" link-prefix="post/" />
@endsection