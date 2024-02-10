@extends('layout.mystore')
@section('title', $viewData['title'])
@section('content')
    <div class="container-fluid d-flix align-items-center flex-column">
        <div class="row" style="margin-bottom: 15%">
            <div class="card bg-primary">
                <div class="cadr-header">
                    <h3>Courts</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('courts.index') }}">{{ Court::all()->count() }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
