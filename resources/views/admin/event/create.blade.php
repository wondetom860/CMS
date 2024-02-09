@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New event')
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Register New event
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.event.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">case_id:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="case_id" value="{{ old('case_id') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">event_type_id:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="event_type_id" value="{{ old('event_type_id') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">date_time:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="date_time" value="{{ old('date_time') }}" type="text" class="form-control">
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
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">location:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="location" value="{{ old('location') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-12 row">
                            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label text-right">out_come:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input name="out_come" value="{{ old('out_come') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
