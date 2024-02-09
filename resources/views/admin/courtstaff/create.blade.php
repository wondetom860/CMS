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
                    <label class="form-label">Court Id</label>
                    <select class="form-select">
                      <option>select</option>
                      <option></option>
                    </select>
                  </div>
                      <div class="mb-3">
                        <label class="form-label">Person Id</label>
                        <select class="form-select">
                          <option>select</option>
                          <option value=""></option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label"> Staff Role Id </label>
                        <select class="form-select">
                          <option>select</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
@endsection
