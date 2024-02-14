@extends('layout.admin')
@section('title', 'Party Detail')
@section('subtitle',  $viewData['subtitle'])
@section('content')
<div class="container">
        <h3 class="float-right">
            Detail: 
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/images' . $viewData['party']->getLogoPath()) }}" class="img-fluid rounded-start" style="width: 320px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><b>Case number : </b>{{ $viewData['party']->case->case_number }}</p>
                        <p class="card-text"><b>Person : </b>{{ $viewData['party']->person->getFullName() }}</p>
                        <p class="card-text"><b>Party Type : </b>{{ $viewData['party']->partyType->party_type_name}}</p>
                        <p class="card-text"><b>Date : </b>{{ $viewData['party']->date_time }}</p>
                        <div class="container-fluid">
                            @include('admin.party.partials._docs',['party' => $viewData['party']])
                        </div>
                        <div class="container-fluid">
                            @include('admin.party.partials._events',['party' => $viewData['party']])
                        </div>
                        <div class="container-fluid">
                            @include('admin.party.partials._staffs',['party' => $viewData['party']])
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
