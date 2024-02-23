@extends('layout.adminLTE')
@section('title', 'Court Detail')
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="container-fluid ">
    <h3 class="">
        Detail: {{ $viewData['court_staff']->getStaffDetail() }} - Court Staff Detail
    </h3>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4 p-2">
                <img src="{{ asset('/images' . $viewData['court_staff']->court->getLogoPath()) }}" class="img-fluid rounded-start" style="width: 320px; height:auto">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['court_staff']['name'] }} ({{ $viewData['court_staff']->name }})
                    </h5>
                    <p class="card-text">Court Name: {{ $viewData['court_staff']->court->name }}</p>
                    <p class="card-text" style="">Person Name: {{ $viewData['court_staff']->person->getFullName() }}</p>
                    <p class="card-text"> Staff Role Name :{{ $viewData['court_staff']->staffrole->role_name}}</p>
                    {{-- <div class="container-fluid"> --}}
                        {{-- @include('admin.courtstaff.detail',['courtstaff' => $viewData['court_staff']]) --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
