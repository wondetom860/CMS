<!-- resources/views/case_staff_assignments/create.blade.php -->

@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <h3 class="d-flex flex-row bd-highlight mb-3 bg-light">Create Case Staff Assignment</h3>
<div class="mb-3 bd-highlight">
    <form method="POST" action="{{ route('admin.case_staff_assignments.store') }}">
        @csrf
        @include('admin.case_staff_assignments.form')
        <button type="submit" class="btn btn-primary btn-xs mt-4 float-start">Create</button>
    </form>
</div>
@endsection
