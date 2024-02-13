<!-- resources/views/case_staff_assignments/create.blade.php -->

@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
<h3 class="d-flex flex-row bd-highlight mb-3 bg-light">Create Case Staff Assignment</h3>
<div class="mb-3 bd-highlight">
    <form method="POST" action="{{ route('admin.case_staff_assignments.store') }}">
        @csrf
        <label for="case_id">Select Case:</label>
        <select name="case_id" id="case_id" class="form-select">
            @foreach($viewData['cases'] as $case)
            <option value="{{ $case->id }}">{{ $case->case_number }} </option>
            @endforeach
        </select>

        <label for="court_staff_id">Select Staff:</label>
        <select name="court_staff_id" id="court_staff_id" class="form-select">
            @foreach($viewData['court_staffs'] as $staff)
            <option value="{{ $staff->id }}">{{ $staff->getStaffDetail() }} - {{$staff->staffrole->role_name}}</option>
            @endforeach
        </select>

        <button class="btn btn-primary" type="submit">Assign Case</button>
    </form>
</div>
@endsection