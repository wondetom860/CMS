@extends('layout.adminLTE')
@section('title', 'Case Detail')
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>
                    Detail: {{ $viewData['case']->getDetail() }}
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 p-2">
                        <img src="{{ asset('/images' . $viewData['case']->getLogoPath()) }}" class="img-fluid rounded-start"
                            style="width: 320px; height:auto">
                    </div>
                    <div class="col-md-9">
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

    const submitClientForm = () => {
        console.log($("#first_name").val());
        $.ajax({
            url: "{{ route('admin.party.store') }}",
            type: "POST",
            data: $("#party_register_form").serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data == 1) {
                    window.location.href = window.location;
                } else {
                    alert(data);
                }
            }
        });
    }

    const registerParty = (case_id) => {
        $("#modal_body").html('Loading party registration form');
        $("#formModalLabel").html("Register parties for case {{ $viewData['case']->case_number }}");
        $.post('{{ route('admin.party.create_partial') }}', {
            case_id: case_id
        }).done((resp) => {
            $("#modal_body").html(resp);
        });
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    }
    // $('#formModal').on('hide.bs.modal', function(e) {
    //     window.location.href = window.location;
    // });
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
    // organizational excellence
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
