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
                        <th>case_number</th>
                        <th>cause_of_action</th>
                        <th>court</th>
                        <th>case_status</th>
                        <th>case_type</th>
                        <th>start_date</th>
                        <th>end_date</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['case'] as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->case_number }}</td>
                                <td>{{ $c->cause_of_action }}</td>
                                <td>{{ $c->court_id }}</td>
                                <td>{{ $c->case_status }}</td>
                                <td>{{ $c->case_type_id }}</td>
                                <td>{{ $c->start_date }}</td>
                                <td>{{ $c->end_date }}</td>
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
