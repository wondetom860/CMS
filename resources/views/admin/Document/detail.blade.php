@extends('layout.adminLTE')
@section('title', 'Document Detail')
@section('subtitle', $document->name)
@section('content')
    <div class="container-fluid ">
        <h3 class="">
            Detail: {{ $document->name }} - Document page
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/storage' . '/' . $document->image) }}" class="img-fluid rounded-start"
                        style="width: 350px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><b>Case number : </b>{{ $viewData['document']->case->case_number }}</p>
                        <p class="card-text"><b>Submitted By : </b>{{ $viewData['document']->csa->courtStaff->person->getFullName() }}</p>
                        <p class="card-text"><b>Date : </b>{{ $viewData['event']->date_filed }}</p>
                        <p class="card-text"><b>description : </b>{{ $viewData['event']->description }}</p>
                        <p class="card-text"><b>doc storage path : </b>{{ $viewData['event']->doc->doc_storage_path }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
