@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Edit Laststatment
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.laststatment.update', ['id' => $viewData['Document']->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label
                                class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Statment Description') }}:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <textarea class="form-control" name="description" rows="3">{{ $viewData['Document']->statement_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label
                                class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('remark') }}:</label>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                <textarea class="form-control" name="remark" rows="3">{{ $viewData['Document']->remark }}</textarea>
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
                                <textarea class="form-control" name="description" rows="3">{{ $viewData['Document']->accept_status }}</textarea>
                            </div>
                        </div>
                    </div>
                </div> --}}
                
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
