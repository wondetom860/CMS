@extends('layout.adminLTE')
@section('title', 'Document Detail')
@section('subtitle', $viewData['document']->documentType->doc_type_name)
@section('content')
    <div class="container-fluid ">
        <h3 class="">
            Detail: {{ $viewData['document']->documentType->doc_type_name }} - Document page
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/storage' . '/' . $viewData['document']->doc_storage_path) }}" class="img-fluid rounded-start"
                        style="width: 350px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><b>Case number : </b>{{ $viewData['document']->case->case_number }}</p>
                        <p class="card-text"><b>Submitted By : </b>{{ $viewData['document']->caseStaffAssignemnt->courtStaff->person->getFullName() }}</p>
                        <p class="card-text"><b>Date : </b>{{ $viewData['document']->date_filed }}</p>
                        <p class="card-text"><b>description : </b>{{ $viewData['document']->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
