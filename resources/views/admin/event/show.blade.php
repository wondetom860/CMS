@extends('layout.admin')
@section('title', 'event Detail')
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <h3 class="float-right">
            Detail: {{ $viewData['event']->getDetail() }} - event Detail
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/storage' . '/' . $viewData['event']->logo_image_path) }}" class="img-fluid rounded-start" style="width: 350px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $viewData['event']['case_id'] }} (${{ $viewData['event']->case_id }})
                        </h5>
                        <p class="card-text">{{ $viewData['event']->event_type_id }}</p>
                        <p class="card-text">{{ $viewData['event']->date_time }}</p>
                        <p class="card-text">{{ $viewData['event']->location }}</p>
                        <p class="card-text">{{ $viewData['event']->out_come }}</p>
                        <p class="card-text"><small class="text-muted">Register event</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
