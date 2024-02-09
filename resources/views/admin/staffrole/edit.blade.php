@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', 'edit staffrole')
@section('content')
<div class="card mb-4">
    <div class="card-header">Edit Staffrole
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.staffrole.update', ['id' => $viewData['staffrole']->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-12 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">Role Name:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                            <input name="role_name" value="{{ $viewData['staffrole']->role_name }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-12 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">Order:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                            <input name="rank" value="{{ $viewData['staffrole']->rank }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ $viewData['staffrole']->description }}</textarea>
                    </div>
                </div>
            </div>
            {{-- <div class="row m-2">
                <div class="col">
                    <div class="mb-12 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">Decreption:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                            <input name="city" value="{{ old('city') }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection