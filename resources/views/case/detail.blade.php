@extends('layout.mystore')
@section('title', 'Case Detail')
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <h3 class="float-right">
            Detail: {{ $viewData['case']->getDetail() }}
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/images' . $viewData['case']->getLogoPath()) }}" class="img-fluid rounded-start"
                        style="width: 320px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><b>Case number : </b>{{ $viewData['case']->case_number }}</p>
                        <p class="card-text"><b>Court Name : </b>{{ $viewData['case']->court->name }}</p>
                        <p class="card-text"><b>Case Type : </b>{{ $viewData['case']->caseType->case_type_name }}</p>
                        <p class="card-text"><b>Registered On : </b>{{ $viewData['case']->created_at }}</p>
                        <div class="container-fluid">
                            @include('case.partials._docs', ['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('case.partials._events', ['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('case.partials._staffs', ['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('case.partials._parties', ['case' => $viewData['case']])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    const registerEvent = (case_id) => {
        $("#modal_body").html($("#event-form-container").html());
        $("#formModalLabel").html("Schedule Event for case {{ $viewData['case']->case_number }}");
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    }
    const shoeDoc = (doc_id) => {
        $("#modal_body").html("Loading document....");
        $("#formModalLabel").html("Uploaded document detail");
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    }
    const attachDoc = (case_id) => {
        // clientId = $("#id_number_search").val();
        $("#modal_body").html($("#doc-form-container").html());
        $("#formModalLabel").html("Attach document for case {{ $viewData['case']->case_number }}");
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
        // $("id_number").val(clientId);
    }
</script>

<div id="doc-form-container" class="d-none">
    @include('admin.Document._partials._form', ['case' => $viewData['case']])
</div>

<div id="event-form-container" class="d-none">
    @include('admin.event._partials._form', ['case' => $viewData['case']])
</div>

<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">Attach document to a case
                </h4>
            </div>
            <div class="modal-body" id="modal_body">
                
            </div>
        </div>
    </div>
</div>
