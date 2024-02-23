@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Edit Case
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.document.update', ['id' => $viewData['document']->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Case Number:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <select name="case_id" id="case_id" class="form-control">
                                    @foreach ($viewData['cases'] as $case)
                                        <option value="{{ $case->id }}">{{ $case->case_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">csa numeber:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <select name="case_id" id="case_id" class="form-control">
                                    @foreach ($viewData['cases'] as $case)
                                        <option value="{{ $csa->id }}">{{ $case->csa_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">document type:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <select name="event_type_id" id="event_type_id" class="form-control">
                                    @foreach ($viewData['eventTypes'] as $dType)
                                        <option value="{{ $dType->id }}">{{ $dType->document_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col"> &nbsp;
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ $viewData['product']->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
