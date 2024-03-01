@extends('layout.adminLTE')
{{-- @section('title', $viewData['title']) --}}
{{-- @section('innerTitle', $viewData['subtitle']) --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Change Court Staff</div>

                <div class="card-body">
                    <form action="{{ route('admin.change_court_staff.update', $changeCourtStaff->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Form fields pre-populated with existing data -->
                        <!-- Example: -->
                        <div class="form-group">
                            <label for="csa_id">CSA ID:</label>
                            <input type="text" class="form-control" id="csa_id" name="csa_id" value="{{ $changeCourtStaff->csa_id }}">
                        </div>

                        <!-- Add more form fields for other columns -->

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
