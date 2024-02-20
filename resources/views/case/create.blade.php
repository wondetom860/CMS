@extends('layout.mystore')
@section('title', $viewData['title'])
@section('innerTitle', 'Register New Case')
@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header"> Register New Case
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('case.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Case Number:</label>
                                <div class="col-md-6 col-sm-12">
                                    <input name="case_number" @readonly(true) value="{{ old('case_number') }}"
                                        type="text"
                                        title="Case number will be assigned on successfull registeration of case."
                                        placeholder="[XXX-XX-XXX]" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Client
                                    Category:</label>
                                <div class="col-md-6 col-sm-12">
                                    <select name="party_type_id" id="party_type_id" class="form-select">
                                        @foreach ($viewData['partyType'] as $partyType)
                                            <option value="{{ $partyType->id }}">{{ $partyType->party_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-6 col-sm-12 col-form-label">Client Name:</label>
                                <div class="col-md-3 col-sm-12">
                                    <select name="person_id" id="person_id" class="form-control">
                                        @foreach ($viewData['clients'] as $client)
                                            <option value="{{ $client->id }}">{{ $client->getFullName() }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input name="name" value="{{ old('name') }}" type="text" class="form-control"> --}}
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <input id="id_number_search" name="id_number_search"
                                        value="{{ old('id_number_search') }}" type="text" class="form-control">
                                    <button id="search_existing" class="btn btn-xs btn-default btn-link"
                                        onclick="searchClientByIdNumber(); return false">Search By ID</button>
                                    <button id="register_new" class="btn btn-xs btn-link d-none"
                                        onclick="RegsiterClient(); return false">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Cause Of
                                    Action:</label>
                                <div class="col-md-6 col-sm-12">
                                    <textarea name="cause_of_action" rows="2" class="form-control">{{ old('cause_of_action') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Court') }}:</label>
                                <div class=" col-md-6 col-sm-12">
                                    <select name="court_id" id="court_id" class="form-control">
                                        @foreach ($viewData['courts'] as $court)
                                            <option value="{{ $court->id }}">{{ $court->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4 row">
                                <label
                                    class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('CaseType') }}:</label>
                                <div class=" col-md-6 col-sm-12">
                                    <select name="case_type_id" id="case_type_id" class="form-control">
                                        @foreach ($viewData['case_type'] as $case_t)
                                            <option value="{{ $case_t->id }}">{{ $case_t->case_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col">
                            <div class="mb-4 row">
                                <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">Report Date:</label>
                                <div class="col-md-6 col-sm-12">
                                    <input name="start_date" value="{{ old('start_date') }}" type="date"
                                        class="form-control">
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
    <script>
        const RegsiterClient = () => {
            clientId = $("#id_number_search").val();
            $('#myForm').trigger("reset");
            $('#formModal').modal('show');
            $("id_number").val(clientId);
            $("#client_registration_id").val(1);
        }
        const submitClientForm = () => {
            $.ajax({
                url: "{{ route('admin.person.store') }}",
                type: "post",
                data: $("#case_register_form").serialize(),
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
        $("#case_register_form").on('submit', function() {

            return false;
        });

        function searchClientByIdNumber() {
            // clientId = document.getElementById('id_number').value;
            clientId = $("#id_number_search").val();

            $.ajax({
                url: "{{ route('person.findPerson') }}",
                type: "post",
                data: {
                    personId: clientId
                },
                dataType: 'JSON',
                success: function(data) {
                    if (data == 0) {
                        $("#search_existing").addClass('d-none');
                        $("#register_new").removeClass('d-none');
                        $("#id_number").val(clientId);
                        $("#person_id").html(0);
                    } else {
                        try {
                            $("#person_id").val(data);
                        } catch (error) {
                            alert("Erro while loading data");
                            console.log(error);
                        }
                    }
                }
            });
        }
    </script>
@endsection

<div class="modal fade" id="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">Create Accout for Client
                </h4>
            </div>
            <div class="modal-body" id="modal_body">
                @include('admin.person._partials._form')
            </div>
        </div>
    </div>
</div>
