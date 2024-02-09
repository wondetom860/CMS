@extends('layout.mystore')
@section('title', $viewData['title'])
@section('innerTitle', 'Register Case')
@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header"> Register New Case
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('case.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
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
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Case Of Action:</label>
                            <div class="col-md-6 col-sm-12">
                                <input name="case_of_action" value="{{ old('case_of_action') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Case Type:</label>
                            <div class="col-md-6 col-sm-12">
                                <input name="case_type_id" value="{{ old('case_type_id') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Start Date:</label>
                            <div class="col-md-6 col-sm-12">
                                <input name="start_date" value="{{ old('start_date') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">End Date:</label>
                            <div class="col-md-6 col-sm-12">
                                <input name="end_date" value="{{ old('price') }}" type="end_date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
        <div class="row">
            <div class="col-8">
                <div class="mb-4 row" style="float:right">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection