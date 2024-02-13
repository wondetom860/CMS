@extends('layout.admin')
@section('title', 'Event Detail')
@section('subtitle',  $viewData['subtitle'])
@section('content')
<div class="container">
        <h3 class="float-right">
            Detail: {{ $viewData['event']->getDetail() }} 
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/images' . $viewData['event']->getLogoPath()) }}" class="img-fluid rounded-start" style="width: 320px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><b>Case number : </b>{{ $viewData['event']->case->case_number }}</p>
                        <p class="card-text"><b>Date : </b>{{ $viewData['event']->date_time }}</p>
                        <p class="card-text"><b>Outcome : </b>{{ $viewData['event']->out_come}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
