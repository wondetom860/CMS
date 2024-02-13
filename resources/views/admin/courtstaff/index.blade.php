@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Courts - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.courtstaff.create') }}"
                    style="align-self: flex-end">Register Court Staff </a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Court </th>
                        <th>Person</th>
                        <th>Staff Role</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['court_staff'] as $court_staff)
                            <tr>
                                <td>{{ $court_staff->id }}</td>
                                <td>{{ $court_staff->court->name }}</td>
                                <td>{{ $court_staff->person->getFullName() }}</td>
                                <td>{{ $court_staff->staffrole->role_name }}</td>
                                <td><a href="{{ route('admin.courtstaff.show', ['id' => $court_staff->id]) }}">Show</a></td>
                                <td>
                                    <a href="{{ route('admin.courtstaff.edit', ['id' => $court_staff->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.courtstaff.delete', ['id' => $court_staff->id]) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete court profile?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                {{-- <td><a href="{{route('admin.courtstaff.delete',['id' => $court_staff->id])}}" onclick="return confirm('Are you sure to remove an item?');">Delete</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
