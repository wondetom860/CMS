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
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Case Number:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <select name="case_id" id="case_id" class="form-control">
                                    @foreach ($viewData['cases'] as $case)
                                        <option value="{{ $case->id }}">{{ $case->case_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Event Type:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <select name="event_type_id" id="event_type_id" class="form-control">
                                    @foreach ($viewData['eventTypes'] as $eType)
                                        <option value="{{ $eType->id }}">{{ $eType->event_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Date:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <input name="date_time" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Location:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <input name="location" value="{{ old('location') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Outcome:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <input name="out_come" value="{{ old('out_come') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary register-caseType-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
