@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Court Staff')
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Register New Court Staff
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.courtstaff.store') }}">
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
                            <option value="{{ $persons->id }}">{{ $persons->getFullName() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"> Staff Role</label>
                    <select name="staff_role_id" id="staff_role_id" class="form-control">
                        @foreach ($viewData['staff_role'] as $staff_role)
                            <option value="{{ $staff_role->id }}">{{ $staff_role->role_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
