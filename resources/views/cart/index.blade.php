@extends('layout.mystore')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"> Products in Cart
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-left">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price(PPC)</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['products'] as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>${{ $product->price }}</td>
                                <td>{{ session('products')[$product->id] }}</td>
                                <td>{{ session('products')[$product->id] * $product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="text-end">
                        <a class="btn btn-outline-secondary mb-2">
                            <b>Total to pay:</b> ${{ $viewData['total'] }}
                        </a>
                        @if (count($viewData['products']) > 0)
                            <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Purchase</a>
                            <a href="{{ route('cart.delete') }}" class="btn btn-danger mb-2">Remove all products from
                                Cart</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
