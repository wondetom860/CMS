@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', __('Register New Event Type'))
@section('content')
    <div class="card mb-4">
        <div class="card-header bg-light"> {{__('Register New Event Type')}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.event-type.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="form-label">{{__('Event Type')}}:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="event_type_name" value="{{ old('event_type_name') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="form-label">{{__('Description')}}:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
            </form>
        </div>
    </div>
@endsection
