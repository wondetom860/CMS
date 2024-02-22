@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Court')
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Register New Court
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.court.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">Court Name:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">State:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="state" value="{{ old('state') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                        </div>
                    </div> --}}
                </div>
                <div class="row m-2">
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">City:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="city" value="{{ old('city') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">Zip:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="zip" value="{{ old('zip') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
