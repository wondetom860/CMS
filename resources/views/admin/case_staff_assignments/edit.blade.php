@extends('layout.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Edit Case Staff Assignment
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST"
                action="{{ route('admin.case_staff_assignments.update', ['id' => $viewData['case_staff_assignment']->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label for="case_id" class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Select
                                Case Number:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <select name="case_id" id="case_id" class="form-select">
                                    @foreach ($viewData['cases'] as $case)
                                        <option value="{{ $case->id }}" @selected($case->id == $viewData['case_staff_assignment']->case_id)>
                                            {{ $case->case_number }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label for="case_id" class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Assigned
                                As:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <select name="assigned_as" id="case_staff_assignment_id" class="form-select">
                                    @foreach ($viewData['staff_roles'] as $staff_role)
                                        <option value="{{ $staff_role->role_name }}" @selected($staff_role->role_name == $viewData['case_staff_assignment']->assigned_as)>
                                            {{ $staff_role->role_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label for="court_staff_id" class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Select
                                Staff:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <select name="court_staff_id" id="court_staff_id" class="form-select">
                                    @foreach ($viewData['court_staffs'] as $staff)
                                        <option value="{{ $staff->id }}" @selected($staff->id == $viewData['case_staff_assignment']->court_staff_id)>
                                            {{ $staff->getStaffDetail() }} -
                                            {{ $staff->staffrole->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
