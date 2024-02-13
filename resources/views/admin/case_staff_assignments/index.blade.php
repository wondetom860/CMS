@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Assign Staff To case- Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs float-end" href="{{ route('admin.case_staff_assignments.create') }}">Assign
                    The Case</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>Case ID</th>
                        <th>Court Staff</th>
                        <th>Assigned As</th>
                        <th>Assigned At</th>
                        <th>Assigned By</th>
                        <th>Actions</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['case_staff_assignment'] as $case_staff_assignment)
                            <tr>
                                {{-- <td>{{ $case_staff_assignment->id }}</td> --}}
                                <td>{{ $case_staff_assignment->case->case_number }}</td>
                                <td>{{ $case_staff_assignment->courtStaff->person->getFullName() }}</td>
                                <td>{{ $case_staff_assignment->assigned_as }}</td>
                                <td>{{ $case_staff_assignment->assigned_at }}</td>
                                <td>{{ $case_staff_assignment->assignedBy->user_name }}</td>
                                <td>
                                    <a
                                        href="{{ route('admin.case_staff_assignments.show', $case_staff_assignment->id) }}">View</a>
                                    {{-- <a
                                         href="{{ route('admin.case_staff_assignments.edit', $case_staff_assignment->id) }}">Edit</a> --}}
                                </td>
                                <td><a
                                        href="{{ route('admin.case_staff_assignments.show', ['id' => $case_staff_assignment->id]) }}">Show</a>
                                </td>
                                <td>
                                    {{-- <a href="{{ route('admin.case_staff_assignments.edit', ['id' =>$case_staff_assignment->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a> --}}
                                </td>
                                <td>
                                    {{-- <form action="{{ route('admin.case_staff_assignments.delete', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete case_staff_assignments?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form> --}}
                                </td>
                                {{-- <td><a href="{{route('admin.case_staff_assignments.delete',['id' => $case->id])}}" onclick="return confirm('Are you sure to remove an item?');">Delete</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
