@extends('layout.app')
$viewData['title'] = "Case Assignment";
$viewData['subtitle'] = "Detail of cases Assigned";
@section('content')
    <div class="container">
        <h1>Show Change Court Staff</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Change Court Staff Information</h5>
                @foreach($viewData['change'] as $change)
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
                @endforeach
                <a href="{{ route('admin.change_court_staff.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
