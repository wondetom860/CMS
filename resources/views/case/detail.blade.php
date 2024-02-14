@extends('layout.mystore')
@section('title', 'Case Detail')
@section('subtitle',  $viewData['subtitle'])
@section('content')
<div class="container">
        <h3 class="float-right">
            Detail: {{ $viewData['case']->getDetail() }} 
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/images' . $viewData['case']->getLogoPath()) }}" class="img-fluid rounded-start" style="width: 320px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><b>Case number : </b>{{ $viewData['case']->case_number }}</p>
                        <p class="card-text"><b>Court Name : </b>{{ $viewData['case']->court->name }}</p>
                        <p class="card-text"><b>Case Type : </b>{{ $viewData['case']->caseType->case_type_name}}</p>
                        <p class="card-text"><b>Created At : </b>{{ $viewData['case']->created_at}}</p>
                        <div class="container-fluid">
                            @include('case.partials._docs',['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('case.partials._events',['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('case.partials._staffs',['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('case.partials._parties',['case' => $viewData['case']])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
