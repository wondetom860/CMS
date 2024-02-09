@extends('layout.admin')
@section('title', 'staffrole Detail')
@section('subtitle', $viewData['court_staff']->court->name)
@section('content')
<div class="container">
    <h3 class="float-right">
        Detail: {{$viewData['court_staff']->court->name }} - Court Staff page
    </h3>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4 p-2">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Court </th>
                        <th>Person</th>
                        <th>Staff Role Name</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tr>
                        <td>{{ $viewData['court_staff']->id }}</td>
                        <td>{{ $viewData['court_staff']->court->name }}</td>
                        <td>{{ $viewData['court_staff']->person->getFullName() }}</td>
                        <td>{{ $viewData['court_staff']->staff_role_id}}</td>
                        <td>
                            <a href="{{ route('admin.staffrole.edit', ['id' =>$viewData['court_staff']->id]) }}">
                                <button class="btn btn-primary">
                                    <i class="bi-pencil"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.staffrole.delete', ['id' => $viewData['court_staff']->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-cs btn-danger"
                                    onclick="return confirm('Are you sure to delete court profile?');">
                                    <i class="bi-trash"></i>
                                </button>
                            </form>
                        </td>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



