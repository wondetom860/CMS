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









@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Show Change Court Staff</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Change Court Staff Information</h5>
                <p class="card-text"><strong>ID:</strong> {{ $change->id }}</p>
                <p class="card-text"><strong>CSA ID:</strong> {{ $change->csa_id }}</p>
                <p class="card-text"><strong>Termination Reason:</strong> {{ $change->termination_reason }}</p>
                <p class="card-text"><strong>Requested At:</strong> {{ $change->requestd_at }}</p>
                <p class="card-text"><strong>Requested By:</strong> {{ $change->requested_by }}</p>
                <p class="card-text"><strong>Requested At:</strong> {{ $change->requested_at }}</p>
                <p class="card-text"><strong>Request Accepted:</strong> {{ $change->request_accepted }}</p>
                <p class="card-text"><strong>Request Accepted At:</strong> {{ $change->request_accepted_at }}</p>
                <p class="card-text"><strong>Approval Status:</strong> {{ $change->approval_status }}</p>
                <p class="card-text"><strong>Approved At:</strong> {{ $change->approved_at }}</p>
                <p class="card-text"><strong>Approved By:</strong> {{ $change->approved_by }}</p>
                <p class="card-text"><strong>Remark:</strong> {{ $change->remark }}</p>
                <p class="card-text"><strong>Created At:</strong> {{ $change->created_at }}</p>
                <p class="card-text"><strong>Updated At:</strong> {{ $change->updated_at }}</p>
                <a href="{{ route('admin.change_court_staff.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
