@extends('layout.mystore')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Cases - CCMS
                <a class="btn btn-primary btn-xs register-case-btn" href="{{ route('case.create') }}"
                    style="align-self: flex-end">Register Case</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Case Numner</th>
                        <th>Court</th>
                        <th>Cause</th>
                        <th>Case Type</th>
                        <th>Date reported</th>
                        <th>Status</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['case'] as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->case_number }}</td>
                                <td>{{ $c->court->name }}</td>
                                <td>{{ $c->cause_of_action }}</td>
                                <td>{{ $c->caseType->case_type_name }}</td>
                                <td>{{ $c->start_date }}</td>
                                <td>{{ $c->case_status }}</td>
                                <td><a href="{{ route('case.show', ['id' => $c->id]) }}">Show</a></td>
                                <td>
                                    <a href="{{ route('case.edit', ['id' => $c->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('case.delete', ['id' => $c->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to remove an case?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
