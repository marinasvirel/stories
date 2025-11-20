@extends('layouts.main')
@section('title', 'Интересные истории | Добавить историю')
@section('content')
<x-story :post="$post"/>
@endsection