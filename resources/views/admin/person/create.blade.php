@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', 'Register Person Information')
@section('content')
    @include('admin.person._partials._form')
@endsection
