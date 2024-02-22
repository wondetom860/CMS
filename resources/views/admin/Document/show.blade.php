@extends('layout.adminLTE')
@section('title', 'Document Detail')
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <h3 class="float-right">
            Detail: {{ $viewData['event']->getDetail() }} - Document Detail
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/storage' . '/' . $viewData['Document']->logo_image_path) }}"
                        class="img-fluid rounded-start" style="width: 350px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $viewData['Document']['case_id'] }} (${{ $viewData['Document']->case_id }})
                        </h5>
                        <p class="card-text">{{ $viewData['Document']->csa_id }}</p>
                        <p class="card-text">{{ $viewData['Document']->document_type_id }}</p>
                        <p class="card-text">{{ $viewData['Document']->date_filed }}</p>
                        <p class="card-text">{{ $viewData['Document']->description }}</p>
                        <p class="card-text">{{ $viewData['Document']->doc_storage_path }}</p>
                        <p class="card-text"><small class="text-muted">Register Document</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
