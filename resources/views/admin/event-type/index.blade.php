@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Event Types - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.event-type.create') }}"
                    style="align-self: flex-end">Register New Event Type</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Event Type</th>
                        <th>Description</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['event_type'] as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->event_type_name }}</td>
                                <td>{{ $p->description }}</td>
                                <td><a href="{{ route('admin.event-type.show', ['id' => $p->id]) }}">Show</a></td>
                                <td>
                                    <a href="{{ route('admin.event-type.edit', ['id' => $p->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.event-type.delete', ['id' => $p->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete event-type profile?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                {{-- <td><a href="{{route('admin.product.delete',['id' => $p->id])}}" onclick="return confirm('Are you sure to remove an item?');">Delete</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
