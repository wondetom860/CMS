<!-- resources/views/case_staff_assignments/create.blade.php -->

@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
<div class="card mb-4">
    <div class="card-header"> Create Case Staff Assignment
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.case_staff_assignments.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label for="case_id" class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Select Case:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                            <select name="case_id" id="case_id" class="form-select">
                                @foreach($viewData['cases'] as $case)
                                <option value="{{ $case->id }}">{{ $case->case_number }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label for="court_staff_id" class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Select Staff:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                            <select name="court_staff_id" id="court_staff_id" class="form-select">
                                @foreach($viewData['court_staffs'] as $staff)
                                <option value="{{ $staff->id }}">{{ $staff->getStaffDetail() }} -
                                    {{$staff->staffrole->role_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <button class="btn btn-primary" type="submit">Assign Case</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection