@extends('adminlte::page')

@section('title', $title ?? 'Админка')

@section('content_header')
    <h1>{{ $header ?? 'Добро пожаловать!' }}</h1>
@endsection

@section('content')
    @yield('page-content')
@endsection
