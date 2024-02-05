@extends('layout.mystore')
@section('title', $viewData['title'])
@section('content')
    <div class="container-fluid d-flix align-items-center flex-column">
        <div class="row" style="margin-bottom: 15%">
            <div class="col-md-3 col-lg-3 mb-1">
                <img src="{{ asset('/images/game.png') }}" class="img-fluid rounded">
            </div>
            <div class="col-md-3 col-lg-3 mb-1">
                <img src="{{ asset('/images/safe.png') }}" class="img-fluid rounded">
            </div>
            <div class="col-md-3 col-lg-3 mb-1">
                <img src="{{ asset('/images/submarine.png') }}" class="img-fluid rounded">
            </div>
        </div>
    </div>
@endsection
