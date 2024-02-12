@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Party - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.party.create') }}"
                    style="align-self: flex-end">Register New party</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>case Id</th>
                        <th>Person Id</th>
                        <th>Party Type Id</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['party'] as $court)
                            <tr>
                                <td>{{ $party->id }}</td>
                                <td>{{ $party->case_id }}</td>
                                <td>{{ $party->person_id }}</td>
                                <td>{{ $party->party_type_id }}</td>
                            
                                <td><a href="{{ route('admin.party.show', ['id' => $party->id]) }}">Show</a></td>
                                <td>
                                    {{-- <a href="{{ route('admin.court.edit', ['id' =>$party->id]) }}">
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
