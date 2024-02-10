@extends('layout.mystore')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Documents - Admin Panel - CCMS
                <a class="btn btn-primary btn-xs register-document-btn" href="{{ route('Document.create') }}"
                    style="align-self: flex-end">Register Document</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>case_id</th>
                        <th>csa_id</th>
                        <th>document_type_id</th>
                        <th>date_filed</th>
                        <th>description</th>
                        <th>doc_storage_path</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['Document'] as $document)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->case_id }}</td>
                                <td>${{ $d->csa_id }}</td>
                                <td>{{ $d->document_type_id }}</td>
                                <td>{{ $d->date_filed }}</td>
                                <td>{{ $d->description }}</td>
                                <td>{{ $d->doc_storage_path }}</td>
                                <td><a href="{{ route('Document.show', ['id' => $document->id]) }}">Show</a></td>
                                <td>
                                    <a href="{{ route('Document.edit', ['id' => $document->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('Document.delete', ['id' => $document->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to remove an document?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                {{-- <td><a href="{{route('case.delete',['id' => $item->id])}}" onclick="return confirm('Are you sure to remove an item?');">Delete</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
