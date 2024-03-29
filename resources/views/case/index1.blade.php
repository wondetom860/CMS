@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="">
        <div class="card">
            <h4 class="card-header">
                Document Types - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs register-caseType-btn float-right" href="{{ route('admin.document_type.create') }}"
                    style="align-self: flex-end">Register New Document Type</a>
            </h4>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <th>ID</th>
                        <th>Document Type</th>
                        <th>Description</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['document_type'] as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->doc_type_name }}</td>
                                <td>{{ $p->description }}</td>
                                <td><a href="{{ route('admin.document_type.show', ['id' => $p->id]) }}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                
                                </a></td>
                                <td>
                                    <a href="{{ route('admin.document_type.edit', ['id' => $p->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.document_type.delete', ['id' => $p->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete document_type profile?');">
                                            <i class="fas fa-trash-alt"></i>
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
