<!-- resources/views/case_staff_assignments/edit.blade.php -->

@extends('layout.admin')

@section('content')
    <h1>Edit Case Staff Assignment</h1>

    <form method="POST" action="{{ route('case_staff_assignment.update', $assignment->id) }}">
        @csrf
        @method('PUT')
        @include('case_staff_assignments.form')
        <button type="submit">Update</button>
    </form>
@endsection
