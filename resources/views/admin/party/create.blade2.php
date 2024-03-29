@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Party')
@section('content')
    <div class="card mb-4">
        <div class="card-header bg-light"> Register New party
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.party.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">case Number</label>
                    <select name="case_id" id="case_id" class="form-control">
                        @foreach ($viewData['cases'] as $case)
                            <option value="{{ $case->id }}">{{ $case->case_number }}</option>
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
                    <label class="form-label">Party Type </label>
                    <select name="party_type_id" id="party_type_id" class="form-control">
                        @foreach ($viewData['parttype'] as $party_type)
                            <option value="{{ $party_type->id }}">{{ $party_type->party_type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
