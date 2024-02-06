@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Courts - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs pull-right" href="{{ route('admin.court.create') }}"
                    style="align-self: flex-end">Register New Court</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Court Name</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Zip</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['courts'] as $court)
                            <tr>
                                <td>{{ $court->id }}</td>
                                <td>{{ $court->name }}</td>
                                <td>{{ $court->state }}</td>
                                <td>{{ $court->city }}</td>
                                <td>{{ $court->zip }}</td>
                                <td><a href="{{ route('admin.court.show', ['id' => $court->id]) }}">Show</a></td>
                                <td>
                                    {{-- <a href="{{ route('admin.court.edit', ['id' =>$court->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a> --}}
                                </td>
                                <td>
                                    {{-- <form action="{{ route('admin.court.delete', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete court profile?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form> --}}
                                </td>
                                {{-- <td><a href="{{route('admin.product.delete',['id' => $item->id])}}" onclick="return confirm('Are you sure to remove an item?');">Delete</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
