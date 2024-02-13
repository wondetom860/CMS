@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
<!-- resources/views/case-assignment/create.blade.php -->
<form method="POST" action="{{ route('admin.assign-case.store') }}">
    @csrf
    <div class="form-group">
        <label for="case_id">Select Case:</label>
        <select class="form-control" id="case_id" name="case_id">
            @foreach ($cases as $case)
                <option value="{{ $case->id }}">{{ $case->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="staff_id">Assign to Staff:</label>
        <select class="form-control" id="court_staff_id" name="court_staff_id">
            @foreach ($staffMembers as $staff)
                <option value="{{ $court_staff->id }}">{{ $staff->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Assign Case</button>
</form>
@endsection