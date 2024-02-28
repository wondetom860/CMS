@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Court')
@section('content')
    <div class="card mb-4">
        <div class="card-header bg-light">{{__('Register New Court')}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.court.store') }}">
                @csrf
                <div class="row m-2">
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">{{__('Court Name')}}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">{{__('State')}}:</label>
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
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">{{__('City')}}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="city" value="{{ old('city') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">{{__('Zip Code')}}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="zip" value="{{ old('zip') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
            </form>
        </div>
    </div>
@endsection
