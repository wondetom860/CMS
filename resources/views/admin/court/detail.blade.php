@extends('layout.adminLTE')
@section('title', 'Court Detail')
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container-fluid ">
        <h3 class="">
            Detail: {{ $viewData['court']->getDetail() }} - Court Detail
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/images' . $viewData['court']->getLogoPath()) }}" class="img-fluid rounded-start" style="width: 320px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                           <b>{{ $viewData['court']['name'] }} ({{ $viewData['court']->name }})</b> 
                        </h5>
                        <p class="card-text"><b>State :</b> {{ $viewData['court']->state }}</p>
                        <p class="card-text"><b>City :</b> {{ $viewData['court']->city }}</p>
                        <p class="card-text"><b>Zip :</b> {{ $viewData['court']->zip }}</p>
                        <div class="container-fluid">
                            @include('admin.court.partials.cases_in_court',['court' => $viewData['court']])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
