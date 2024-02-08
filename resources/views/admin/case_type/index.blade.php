@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Case Types - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.case_type.create') }}"
                    style="align-self: flex-end">Register New Case Type</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Case Type</th>
                        <th>Description</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['case_type'] as $ct)
                            <tr>
                                <td>{{ $ct->id }}</td>
                                <td>{{ $ct->case_type_name }}</td>
                                <td>{{ $ct->description }}</td>
                                <td><a href="{{ route('admin.case_type.show', ['id' => $ct->id]) }}">Show</a></td>
                                <td>
                                    <a href="{{ route('admin.case_type.edit', ['id' => $ct->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a> 
                                </td>
                                <td>
                                     <form action="{{ route('admin.case_type.delete', ['id' => $ct->id]) }}" method="get">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete case_type profile?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form> 
                                </td>
                                 <!-- <td><a href="{{route('admin.case_type.delete',['id' => $ct->id])}}" onclick="return confirm('Are you sure to remove an case_type?');">Delete</a></td>  -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
