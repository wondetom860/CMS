@extends('layout.adminLTE')
@section('title', 'Staff-Role Detail')
@section('subtitle', $viewData['staff_role']->role_name)
@section('content')
    <div class="container-fluid ">
        <div class="card">
            <div class="card-header">
                @can('staffrole-create')
                    <h3 class="">
                        Detail: {{ $viewData['staff_role']->role_name }} - Staff Role page
                    </h3>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Role Name</th>
                        <th>Rank</th>
                        <th>description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tr>
                        <td>{{ $viewData['staff_role']->id }}</td>
                        <td>{{ $viewData['staff_role']->role_name }}</td>
                        <td>{{ $viewData['staff_role']->rank }}</td>
                        <td>{{ $viewData['staff_role']->description }}</td>
                        <td>
                            <a href="{{ route('admin.staffrole.edit', ['id' => $viewData['staff_role']->id]) }}">
                                <button class="btn btn-primary">
                                    <i class="bi-pencil"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.staffrole.delete', ['id' => $viewData['staff_role']->id]) }}"
                                method="post">
                                @csrf
                                <button class="btn btn-cs btn-danger"
                                    onclick="return confirm('Are you sure to delete court profile?');">
                                    <i class="bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
