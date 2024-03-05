@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Of Changed Court Staff</div>
    
                    <div class="card-body">
                        <div class="mb-3">
    <a href="{{ route('admin.change_court_staff.create') }}" class="btn btn-primary"> Change Staff</a>
                        </div>
        <table class="table">
            <thead class="card-header" style="font-size: 12.5px;">
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Case Number</th>
                    <th>Assigned Staff</th>
                    <th>Termination Reason</th>
                    {{-- <th>Requested At</th> --}}
                    {{-- <th>Requested By</th> --}}
                    <th>Request Accepted</th>
                    {{-- <th>Request Accepted At</th> --}}
                    <th>Approval Status</th>
                    <th>Approved At</th>
                    <th>Approved By</th>
                    <th>Remark</th>
                    {{-- <th>Created At</th>
                    <th>Updated At</th> --}}
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['changes'] as $change)
                    <tr>
                        {{-- <td>{{ $change->id }}</td> --}}
                        <td>{{ $change->caseStaffAssignment->case->case_number }}</td>
                        <td>{{ $change->caseStaffAssignment->courtStaff->person->getFullName() }}</td>
                        <td>{{ $change->termination_reason }}</td>
                        {{-- <td>{{ $change->requestd_at }}</td> --}}
                        {{-- <td>{{ $change->requestedBy->user_name }}</td> --}}
                        <td>{{ $change->request_accepted ? 'Yes' : 'No' }}</td>
                        {{-- <td>{{ $change->request_accepted_at }}</td> --}}
                        <td>{{ $change->approval_status }}</td>
                        <td>{{ $change->approved_at }}</td>
                        <td>{{ $change->approvedBy ? $change->approvedBy->user_name : 'Not approved yet.' }}</td>
                        <td>{{ $change->remark }}</td>
                        {{-- <td>{{ $change->created_at }}</td>
                        <td>{{ $change->updated_at }}</td> --}}
                        <td><a href="{{route('admin.change_court_staff.show',$change->id )}}" class="btn btn-success">view</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection