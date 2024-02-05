@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                Items - Admin Panel - Online Store
                <a class="btn btn-primary btn-xs pull-right" href="{{ route('admin.products.create') }}"
                    style="align-self: flex-end">Create Item</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['products'] as $item)
                            <tr>
                                <td>{{ $item->id }}</td>

                                <td style="text-align: center" title="{{ $item->description }}" >
                                    <img src="{{ asset('/storage' . '/' . $item['image']) }}" alt="" srcset=""
                                        style="width:100px; height:100px;">
                                </td>

                                <td>{{ $item->name }}</td>
                                <td>${{ $item->price }}</td>
                                <td><a href="{{ route('admin.products.show', ['id' => $item->id]) }}">Show</a></td>
                                <td>
                                    <a href="{{ route('admin.product.edit', ['id' => $item->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.product.delete', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to remove an item?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
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
