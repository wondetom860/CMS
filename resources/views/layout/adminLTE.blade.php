@extends('adminlte::page')
@section('title', 'Dashboard')
@section('header', 'CCMS')
@section('content_header')
    @yield('content_header')
    @notifyCss
    {{-- <link href="/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', __('Admin - MOD - Court Case Management System'))</title>
@stop

@section('content')
    @yield('content')
@stop

@section('footer')
    @yield('footer')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@notifyJs
@include('notify::components.notify')
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop