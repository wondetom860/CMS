@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Document')
@section('content')
    <div class="container-fluid ">
        <div class="card mb-4">
            <div class="card-header"> Register New Document
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.document.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Case number:</label>
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
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Case Assigned
                                    To:</label>
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">document Type
                                    :</label>
                                <div class="col-md-6 col-sm-12">
                                    <select name="document_type_id" id="document_type_id" class="form-select">
                                        @foreach ($viewData['documentTypes'] as $dType)
                                            <option value="{{ $dType->id }}">{{ $dType->doc_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Attach File:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <input type="file" name="file" class="form-control" accept=".jpg,.doc,.pdf">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Description:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <textarea rows="2" name="description" type="text" class="form-control">{{ old('description') }}</textarea>
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
