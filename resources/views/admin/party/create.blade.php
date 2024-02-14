@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Party')
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Register New party
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.party.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Case Id</label>
                    <select class="form-select">
                        <option>select</option>
                        <option></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Person</label>
                    <select class="form-select">
                        <option>select</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"> Party Type</label>
                    <select class="form-select">
                        <option>select</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
