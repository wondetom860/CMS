<div class="container">
    <div class="card mb-4">
        <div class="card-header"> Upload documents to a case {{ $case->case_number }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.document.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-4 col-sm-12 col-form-label">Document Type
                                :</label>
                            <div class="col-md-8 col-sm-12">
                                <select name="document_type_id" id="document_type_id" class="form-select">
                                    @foreach (App\models\DocumentType::all() as $dType)
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
                            <label class="text-right col-lg-4 col-md-4 col-sm-12 col-form-label">Attach File:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <input type="file" name="file" class="form-control" accept=".jpg,.doc,.pdf">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-4 col-sm-12 col-form-label">Description:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12 text-left">
                                <textarea rows="2" name="description" type="text" class="form-control">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <input type="text" class="hidden d-none" name="case_id" id="case_id"
                        value="{{ $case->id }}">
                    <input type="text" class="hidden d-none" name="csa_id" id="csa_id"
                        value="{{ $case->getCsaId() }}">
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mb-4 row" style="float:right">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
