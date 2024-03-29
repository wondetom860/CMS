@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('content')
<div class="card mb-4">
    <div class="card-header"> Edit Event Information
    </div>
    <div class="card-body">
        @if ($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ route('admin.event.update', ['id' => $viewData['event']->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Case Number:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                            <select name="case_id" id="case_id"  class="form-select">
                                @foreach($viewData['cases'] as $case)
                                <option value="{{$case->id}}" @selected($case->id == $viewData['event']->case_id)>
                                    {{$case->case_number}}</option>
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
                            <select name="event_type_id" id="event_type_id" class="form-select">
                                @foreach($viewData['eventTypes'] as $eType)
                                <option value="{{$eType->id}}" @selected($eType->id == $viewData['event']->event_type_id)>
                                    {{$eType->event_type_name}}</option>
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
                            <input name="date_time" type="date" class="form-control" value="{{ $viewData['event']->date_time }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Location:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                            <input name="location" value="{{$viewData['event']->location }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Outcome:</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                            <input name="out_come" value="{{$viewData['event']->out_come  }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <button type="submit" class="btn btn-primary register-caseType-btn">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection