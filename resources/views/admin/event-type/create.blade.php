@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', 'Register Event Type')
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Register Event Type
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.event-type.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Event Type:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="event_type_name" value="{{ old('event_type_name') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
