@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Last Statment')
@section('content')
    <div class="container-fluid ">
        <div class="card mb-4">
            <div class="card-header">{{ __('Register New Last Statment') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.laststatment.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">

                                <label
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Case Number') }}:</label>
                                <div class="col-md-6 col-sm-12">
                                    <select name="case_id" id="case_id" class="form-select">
                                        @foreach ($viewData['csas'] as $csa)
                                            @if (!$csa->case->isClosed())
                                                <option value="{{ $csa->case_id }}">{{ $csa->case->case_number }}</option>
                                            @endif
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
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Statment Description') }}:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <textarea rows="3" name="description" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('remark') }}:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <textarea rows="1" name="remark" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-4 row" style="float:right">
                                <button type="submit" class="btn btn-primary ">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
