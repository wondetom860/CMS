@extends('layout.adminLTE')
 @section('title', $viewData['title']) 
@section('innerTitle',$viewData['subtitle'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Court Staff Details</div>

                <div class="card-body">
                    <p><strong>ID:</strong> {{ $changeCourtStaff->id }}</p>
                    <p><strong>CSA ID:</strong> {{ $changeCourtStaff->csa_id }}</p>
                    <!-- Display other columns here -->

                    <a href="{{ route('admin.change_court_staff.edit', $changeCourtStaff->id) }}" class="btn btn-primary">Edit</a>
                    <!-- Add Delete button if necessary -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
