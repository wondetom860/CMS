@extends('layout.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card">
        <h3 class="card-header">
            {{__($viewData['title']) }}
        </h3>
        <div class="card-body">
            <p>
               {{__('Welcome')}} !!!
            </p>
        </div>
    </div>
@endsection
