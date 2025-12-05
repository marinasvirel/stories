@extends('layouts.main')
@section('title', "$tag | Интересные истории")
@section('content')
<x-stories :posts="$posts" route-name="show" />
@endsection