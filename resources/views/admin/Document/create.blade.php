@extends('layout.mystore')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Document')
@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header"> Register New Document
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.document.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Case id:</label>
                                <div class="col-md-6 col-sm-12">
                                    <input name="case_id" value="{{ old('case_id') }}" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">csa id:</label>
                                <div class="col-md-6 col-sm-12">
                                    <input name="csa_id" value="{{ old('csa_id') }}" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">document Type
                                    id:</label>
                                <div class="col-md-6 col-sm-12">
                                    <input name="document_type_id" value="{{ old('case_type_id') }}" type="text"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Date Filed:</label>
                                <div class="col-md-6 col-sm-12">
                                    <input name="date_filed" value="{{ old('date_filed') }}" type="text"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Description:</label>
                                <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                                    <input name="description" value="{{ old('price') }}" type="text"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">doc storage
                                    path:</label>
                                <div class="col-md-6 col-sm-12">
                                    <input name="doc_storage_path" value="{{ old('price') }}" type="doc_storage_path"
                                        class="form-control">
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
