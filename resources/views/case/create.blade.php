@extends('layout.mystore')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Case')
@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header"> Register New Case
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('case.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Case Number:</label>
                            <div class="col-md-6 col-sm-12">
                                <input name="case_number" value="{{ old('case_number') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Cause Of Action:</label>
                            <div class="col-md-6 col-sm-12">
                                <textarea name="cause_of_action" rows="2"
                                    class="form-control">{{ old('cause_of_action') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Court')
                                }}:</label>
                            <div class=" col-md-6 col-sm-12">
                                <select name="court_id" id="court_id" class="form-control">
                                    @foreach ($viewData['courts'] as $court)
                                    <option value="{{ $court->id }}">{{ $court->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('CaseType')
                                }}:</label>
                            <div class=" col-md-6 col-sm-12">
                                <select name="case_type_id" id="case_type_id" class="form-control">
                                    @foreach ($viewData['case_type'] as $case_t)
                                    <option value="{{ $case_t->id }}">{{ $case_t->case_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Start Date:</label>
                            <div class="col-md-6 col-sm-12">
                                <input name="start_date" value="{{ old('start_date') }}" type="date"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="mb-4 row" style="float:right">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
