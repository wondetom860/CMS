@extends('layout.adminLTE')
@section('title', 'Party Detail')
@section('subtitle',  $viewData['subtitle'])
@section('content')
<div class="container-fluid ">
        <h3 class="">
            Detail: {{ $viewData['Document']->getDetail() }} 
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/images' . $viewData['party']->getLogoPath()) }}" class="img-fluid rounded-start" style="width: 320px; height:auto">
                    
                    <div class="container-fluid">
                        <hr>
                    <p class="card-text"><b>Decision : : </b>{{ $viewData['Document']->statement_description }}</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><b>Case number : </b>{{ $viewData['Document']->case->case_number }}</p>
                        {{-- <p class="card-text"><b>Person : </b>{{ $viewData['party']->person->getFullName() }}</p>
                        <p class="card-text"><b>Party Type : </b>{{ $viewData['party']->partyType->party_type_name}}</p> --}}
                        <p class="card-text"><b>Date : </b>{{ $viewData['party']->created_at }}</p>
                       
                        <div class="container-fluid">
                            @include('admin.party._partials._docs',['party' => $viewData['party']])
                        </div>
                        <div class="container-fluid">
                            @include('admin.party._partials._events',['party' => $viewData['party']])
                        </div>
                        <div class="container-fluid">
                            @include('admin.party._partials._staffs',['party' => $viewData['party']])
                        </div>
                        <div class="container-fluid">
                            @include('admin.party._partials._event1',['case' => $viewData['party']->case])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
