@extends('layout.adminLTE')
{{-- @section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle']) --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Change Court Staff</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.change_court_staff.create') }}" class="btn btn-primary">Add New</a>
                    </div>

                    @if ($changeCourtStaffs->isEmpty())
                        <p>No records found.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CSA ID</th>
                                    <th>Termination Reason</th>
                                    <th>Requested By</th>
                                    <th>Requested At</th>
                                    <th>Request Accepted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($changeCourtStaffs as $changeCourtStaff)
                                    <tr>
                                        <td>{{ $changeCourtStaff->id }}</td>
                                        <td>{{ $changeCourtStaff->csa_id }}</td>
                                        <td>{{ $changeCourtStaff->termination_reason }}</td>
                                        <td>{{ $changeCourtStaff->requested_by }}</td>
                                        <td>{{ $changeCourtStaff->requested_at }}</td>
                                        <td>{{ $changeCourtStaff->request_accepted }}</td>
                                        <td>
                                            <a href="{{ route('admin.change_court_staff.edit', $changeCourtStaff->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.change_court_staff.destroy', $changeCourtStaff->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $changeCourtStaffs->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
