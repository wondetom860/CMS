@extends('layout.adminLTE')
@section('title', 'Case Staff Assignment Detail')
@section('subtitle',  $viewData['subtitle'])
@section('content')
<div class="container-fluid ">
        <h3 class="">
            Detail: {{ $viewData['change_court_staff']->findOrFail() }} 
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/images' . $viewData['case_staff_assignment']->getLogoPath()) }}" class="img-fluid rounded-start" style="width: 320px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><b>case Number : </b>{{ $viewData['case_staff_assignment']->case->case_number }}</p>
                        <p class="card-text"><b>Court Staff : </b>{{ $viewData['case_staff_assignment']->courtStaff->person->getFullName() }}</p>
                        <p class="card-text"><b>Assigned As : </b>{{ $viewData['case_staff_assignment']->assigned_as}}</p>
                        <p class="card-text"><b>Assigned By : </b>{{ $viewData['case_staff_assignment']->assignedBy->user_name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
