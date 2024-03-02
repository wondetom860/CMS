@extends('layout.adminLTE')
@section('title', __('Case Detail'))
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container-fluid">
        <h3 class="bg-info p-2">
            {{ __('Detail') }}: {{ $viewData['case']->getDetail() }}
            @php
                if ($viewData['case']->case_status == 2) {
                    //case judged/decided
                    echo "<button class='btn btn-xs btn-secondary float-right' onclick='GenerateCaseReport({$viewData['case']->id});return false;' title='Generate case summery report'>Generate Case report</button>";
                }
            @endphp
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-3 p-2">
                    <img src="{{ asset('/images' . $viewData['case']->getLogoPath()) }}" class="img-fluid rounded-start"
                        style="width: 320px; height:auto">
                    <hr>
                    <div class="container">
                        <p class="card-text"><b>{{ __('Case Number') }} : </b>{{ $viewData['case']->case_number }}</p>
                        <p class="card-text"><b>{{ __('Court Name') }} : </b>{{ $viewData['case']->court->name }}</p>
                        <p class="card-text"><b>{{ __('Case Type') }} :
                            </b>{{ $viewData['case']->caseType->case_type_name }}</p>
                        <p class="card-text"><b>{{ __('Registered On') }} : </b>{{ $viewData['case']->getDate() }}</p>
                        <p class="card-text"><b>{{ __('Case Status') }} : </b>{{ $viewData['case']->getStatus() }}</p>
                        <p class="card-text"><b>{{ __('Cause of action') }} : </b><small
                                class="p-1 m-0">{{ $viewData['case']->cause_of_action }}</small></p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <div class="container-fluid">
                            @include('case.partials._docs', ['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('case.partials._staffs', ['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('case.partials._events', ['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('case.partials._parties', ['case' => $viewData['case']])
                        </div>
                        <div class="container-fluid">
                            @include('admin.laststatment._partials.virdicts', [
                                'case' => $viewData['case'],
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    const GenerateCaseReport = (case_id) => {
        window.open('/case/get-case-report?case_id=' + case_id, "Case Report {{ date('d/m/Y') }}",
            "menubar=0,location=0,height=700,width=600");
    }
    const lastStatement = (case_id) => {
        $("#modal_body").html('Loading Case Decision form');
        $("#formModalLabel").html("Write Judgement for case {{ $viewData['case']->case_number }}");
        $.get('{{ route('admin.laststatment.create_partial') }}', {
            case_id: case_id
        }).done((resp) => {
            $("#modal_body").html(resp);
        });
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    }
    const sendNotification = (csa_id) => {
        $.get("{{ route('admin.case_staff_assignments.send_notifiation') }}", {
            csa_id: csa_id
        });
    }
    const registerCsa = (case_id) => {
        $("#modal_body").html('Loading Case Staff Assignment form');
        $("#formModalLabel").html("Assign Court Staff for case {{ $viewData['case']->case_number }}");
        $.get('{{ route('admin.case_staff_assignments.create_partial') }}', {
            case_id: case_id
        }).done((resp) => {
            $("#modal_body").html(resp);
        });
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    }
    const registerEvent = (case_id) => {
        $("#modal_body").html($("#event-form-container").html());
        $("#formModalLabel").html("Schedule Event for case {{ $viewData['case']->case_number }}");
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    }

    const addArchive = (event_id) => {
        $("#modal_body").html('Add Archive File');
        $("#formModalLabel").html("Add Archive for case {{ $viewData['case']->case_number }}");
        $.get('{{ route('admin.case_archive.create_partial') }}', {
            event_id: event_id
        }).done((resp) => {
            $("#modal_body").html(resp);
        });
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    }
    const submitCsaForm = () => {
        // console.log($("#first_name").val());
        $.ajax({
            url: "{{ route('admin.case_staff_assignments.store') }}",
            type: "POST",
            data: $("#csa_form").serialize(),
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
    const submitArchiveForm = () => {
        // console.log($("#first_name").val());
        $.ajax({
            url: "{{ route('admin.case_archive.store') }}",
            type: "POST",
            data: $("#archive_form").serialize(),
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
        $.get('{{ route('admin.party.create_partial') }}', {
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
        $.get('/admin/document/readUploadedFile', {
            doc_id: doc_id
        }).done((resp) => {
            $("#modal_body").html(resp);
        });
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    }
    const attachDoc = (case_id) => {
        $("#modal_body").html('Loading document uploading form');
        $("#formModalLabel").html("Attach documents for the case :{{ $viewData['case']->case_number }}");
        $.get('{{ route('admin.document.create_partial') }}', {
            case_id: case_id
        }).done((resp) => {
            $("#modal_body").html(resp);
        });
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    }
    // organizational excellence
</script>

{{-- <div id="csa-form-container" class="d-none">
    @include('admin.case_staff_assignments._partials._form', ['case' => $viewData['case']])
</div> --}}

{{-- <div id="doc-form-container" class="d-none">
    @include('admin.Document._partials._form', ['case' => $viewData['case']])
</div> --}}

<div id="event-form-container" class="d-none">
    @include('admin.event._partials._form', ['case' => $viewData['case']])
</div>

<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">{{ __('Attach document to a case') }}</h4>
            </div>
            <div class="modal-body" id="modal_body">

            </div>
        </div>
    </div>
</div>
