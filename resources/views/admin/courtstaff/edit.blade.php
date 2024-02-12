@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', 'edit court staff')
@section('content')
<div class="card mb-4">
    <div class="card-header">Edit Staffrole
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.courtstaff.update', ['id' => $viewData['court_staff']->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Court</label>
                <select name="court_id" id="court_id" class="form-control">
                  @foreach ($viewData['courts'] as $court)
                      <option value="{{ $court->id }}">{{ $court->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Person</label>
                <select name="person_id" id="person_id" class="form-control">
                  @foreach ($viewData['person'] as $persons)
                      <option value="{{ $persons->id }}">{{ $persons->getFullName()}}</option>
                  @endforeach
              </select>
              </div>
            <div class="mb-3">
                <label class="form-label"> Staff  Role Name</label>
                <select name="staff_role_id" id="staff_role_id" class="form-control">
                  @foreach ($viewData['staffrole'] as $staff_role)
                      <option value="{{ $staff_role->id }}">{{ $staff_role->role_name }}</option>
                  @endforeach
              </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
@endsection