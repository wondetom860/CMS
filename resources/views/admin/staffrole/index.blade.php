@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Courts - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs pull-right" href="{{ route('admin.staffrole.create') }}"
                    style="align-self: flex-end">Register Staff Role</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Role Name</th>
                        <th>Rank</th>
                        <th>description</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['staff_role'] as $staff_role)
                            <tr>
                                <td>{{ $staff_role->id }}</td>
                                <td>{{ $staff_role->role_name }}</td>
                                <td>{{ $staff_role->rank }}</td>
                                <td>{{ $staff_role->description }}</td>
                                <td><a href="{{ route('admin.staffrole.show', ['id' => $staff_role->id]) }}">Show</a></td>
                                <td>
                                    <a href="{{ route('admin.staffrole.edit', ['id' =>$staff_role->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.staffrole.delete', ['id' => $staff_role->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete court profile?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                {{-- <td><a href="{{route('admin.staffrole.delete',['id' => $staff_role->id])}}" onclick="return confirm('Are you sure to remove an item?');">Delete</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
