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
                                        @foreach ($viewData['cases'] as $case)
                                            <option value="{{ $case->id }}">{{ $case->case_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{__('')}}:</label>
                                <div class="col-md-6 col-sm-12">
                                    <select name="csa_id" id="csa_id" class="form-select">
                                        @foreach ($viewData['csas'] as $csa)
                                            <option value="{{ $csa->id }}">
                                                {{ $csa->courtStaff->person->getFullName() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Event') }}
                                    :</label>
                                <div class="col-md-6 col-sm-12">
                                    <select name="document_type_id" id="document_type_id" class="form-select">
                                        @foreach ($viewData['documentTypes'] as $event_id)
                                            <option value="{{ $event->id }}">{{ $event->date_time }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{__('written by')}}:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <input type="file" name="file" class="form-control" accept="">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Statment Description') }}:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <textarea rows="2" name="description" type="text" class="form-control"></textarea>
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
                                    <textarea rows="2" name="remark" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('acceptance status') }}:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <textarea rows="2" name="acceptance_status" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div> --}}


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
