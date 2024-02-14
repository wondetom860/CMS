@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', 'Edit court staff')
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Edit Staff Role
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.courtstaff.update', ['id' => $viewData['court_staff']->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Court :</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <select name="court_id" id="court_id" class="form-select">
                                    @foreach ($viewData['courts'] as $court)
                                        <option value="{{ $court->id }}" @selected($court->id == $viewData['court_staff']->court_id)>
                                            {{ $court->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Person :</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <select name="person_id" id="person_id" class="form-select">
                                    @foreach ($viewData['person'] as $persons)
                                        <option value="{{ $persons->id }}" @selected($persons->id == $viewData['court_staff']->person_id)>
                                            {{ $persons->getFullName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Staff Role :</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <select name="staff_role_id" id="staff_role_id" class="form-select">
                                    @foreach ($viewData['staffrole'] as $staff_role)
                                        <option value="{{ $staff_role->id }}" @selected($staff_role->id == $viewData['court_staff']->staff_role_id)>
                                            {{ $staff_role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary register-caseType-btn">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
