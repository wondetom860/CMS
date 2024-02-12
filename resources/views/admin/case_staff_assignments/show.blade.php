<!-- resources/views/case_staff_assignments/show.blade.php -->

@extends('layout.admin')

@section('content')
    <h1>Case Staff Assignment Details</h1>

    <ul>
        <li>ID: {{ $case_staff_assignmen->id }}</li>
        <li>Case ID: {{ $case_staff_assignmen->case_id }}</li>
        <li>Court Staff ID: {{ $case_staff_assignmen->court_staff_id }}</li>
        <li>Assigned As: {{ $case_staff_assignmen->assigned_as }}</li>
        <li>Assigned At: {{ $case_staff_assignmen->assigned_at }}</li>
        <li>Assigned By: {{ $case_staff_assignmen->assigned_by }}</li>
    </ul>
@endsection
