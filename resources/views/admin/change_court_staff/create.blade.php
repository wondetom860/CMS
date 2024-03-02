@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Change Court Staff</div>

                    <div class="card-body">
                        <form action="{{ route('admin.change_court_staff.store') }}" method="POST">
                            @csrf

                            <!-- Form fields for each column -->
                            <!-- Example: -->
                            <div class="row">
                                <label for="csa_id">CSA ID</label>
                                <select name="csa_id" id="csa_id" class="form-select">
                                    @foreach ($viewData['cass'] as $change)
                                        <option value="{{ $change->id }}">{{ $change->case->case_number }}-{{$change->assigned_as}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <label for="termination_reason">Reason:</label>
                                <input class="form-control" type="text" name="termination_reason" id="termination_reason">

                            </div>
                            <div class="row">

                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>



                            {{-- <select name="csa_id" id="change_court_staff" class="form-select"
                                    aria-placeholder="CSA ID">
                                    <label for="csa_id">CSA ID:</label> --}}
                            {{-- <input type="text" class="form-control" id="change_court_staff" name="csa_id">
                                </select> <select name="requested_by" id="change_court_staff" class="form-select"
                                    placeholder="Requested By">
                                    <label for="requested_by">Requested By:</label> --}}
                            {{-- <input type="text" class="form-control" id="change_court_staff" name="requested_by"> --}}
                            {{-- </select>

                                </select> <select name="approved_by" id="change_court_staff" class="form-select">
                                    <label for="approved_by">Approved By:</label> --}}
                            {{-- <input type="text" class="form-control" id="change_court_staff"
                                        name="approved_by"> --}}
                            {{-- </select> --}}
                            {{-- </div> --}}

                            <!-- Add more form fields for other columns -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
