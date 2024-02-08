@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Party Types - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.party_type.create') }}"
                    style="align-self: flex-end">Register New Party Type</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Party Type</th>
                        <th>Description</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['party_type'] as $pt)
                            <tr>
                                <td>{{ $pt->id }}</td>
                                <td>{{ $pt->party_type_name }}</td>
                                <td>{{ $pt->description }}</td>
                                <td><a href="{{ route('admin.party_type.show', ['id' => $pt->id]) }}">Show</a></td>
                                <td>
                                     <a href="{{ route('admin.party_type.edit', ['id' => $pt->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a> 
                                </td>
                                <td>
                                     <form action="{{ route('admin.party_type.delete', ['id' => $pt->id]) }}" method="get">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete party_type profile?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form> 
                                </td>
                                 <!-- <td><a href="{{route('admin.party_type.delete',['id' => $pt->id])}}" onclick="return confirm('Are you sure to remove an party_type?');">Delete</a></td>  -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
