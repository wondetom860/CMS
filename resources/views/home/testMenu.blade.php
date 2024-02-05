@extends('layout.app')
@section('title')
    test for manu add
@endsection
@section('menu_items')
    @parent
    <li class="nav-item"><a href="#" class="nav-link">New Link 1</a></li>
    <li class="nav-item"><a href="#" class="nav-link">New Link 2</a></li>
    <li class="nav-item"><a href="#" class="nav-link">New Link 3</a></li>
@endsection
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">
            new menus added.3
        </h1>
    </div>
@endsection
