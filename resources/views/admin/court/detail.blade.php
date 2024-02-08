@extends('layout.admin')
@section('title', 'Court Detail')
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <h3 class="float-right">
            Detail: {{ $viewData['court']->getDetail() }} - Court Detail
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/storage' . '/' . $viewData['court']->logo_image_path) }}" class="img-fluid rounded-start" style="width: 350px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $viewData['court']['name'] }} (${{ $viewData['court']->name }})
                        </h5>
                        <p class="card-text">{{ $viewData['court']->state }}</p>
                        <p class="card-text">{{ $viewData['court']->city }}</p>
                        <p class="card-text">{{ $viewData['court']->zip }}</p>
                        <p class="card-text"><small class="text-muted">Register Case</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
