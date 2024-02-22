@extends('layout.mystore')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header"> {{__('Update Case')}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('case.update' , ['id' => $viewData['case']->id])}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{__('Case Number')}} :</label>
                            <div class="col-md-6 col-sm-12">
                                <input name="case_number" @readonly(true) value="{{ $viewData['case']->case_number }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{__('Cause of Action')}} :</label>
                            <div class="col-md-6 col-sm-12">
                                <textarea name="cause_of_action" rows="2"
                                    class="form-control">{{ $viewData['case']->cause_of_action }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Court')}}:</label>
                            <div class=" col-md-6 col-sm-12">
                                <select name="court_id" id="court_id" class="form-control">
                                    @foreach ($viewData['courts'] as $court)
                                    <option value="{{ $court->id }}" @selected($court->id == $viewData['case']->court_id)>
                                        {{ $court->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Case Type')}}:</label>
                            <div class=" col-md-6 col-sm-12">
                                <select name="case_type_id" id="case_type_id" class="form-control">
                                    @foreach ($viewData['case_type'] as $case_t)
                                    <option value="{{ $case_t->id }}" @selected($case_t->id == $viewData['case']->case_type_id)>{{
                                        $case_t->case_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{__('Report Date')}} :</label>
                            <div class="col-md-6 col-sm-12">
                                <input name="start_date" value="{{ $viewData['case']->start_date }}" type="date"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="mb-4 row" style="float:right">
                            <button type="submit" class="btn btn-primary ">{{__('Edit')}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
