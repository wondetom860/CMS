@extends('layout.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card">
        <h3 class="card-header">
            {{ $viewData['title'] }}
        </h3>
        <div class="card-body">
            <p>
                Welcome to Admin Page
            </p>
        </div>
    </div>
@endsection
