@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', 'Add New Archive')
@section('content')

    <div class="card mb-4">
        <div class="card-header"> {{ __('Add New Archive') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.case_archive.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label
                                class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Case Number') }}:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <select name="case_id" id="case_id" class="form-select">
                                    @foreach ($viewData['cases'] as $case)
                                        <option value="{{ $case->id }}">{{ $case->case_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label for="case_id"
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Event Type') }}:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <select name="event_id" id="event_id" class="form-select">
                                        @foreach ($viewData['events'] as $event)
                                            <option value="{{ $event->id }}">{{ $event->eventType->event_type_name }}|{{$event->getDate()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('File') }}:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Description') }}:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <textarea name="description" rows="2" class="form-control">{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Remark') }}:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <textarea name="remark" rows="2" class="form-control">{{ old('remark') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary float-right">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
