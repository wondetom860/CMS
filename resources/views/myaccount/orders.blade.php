@extends('layout.mystore')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        @forelse ($viewData["orders"] as $order)
            <div class="card mb-4">
                <div class="card-header"> Order #<b>{{ strtoupper(md5($order->id)) }}</b>
                </div>
                <div class="card-body">
                    <b>Date:</b> {{ $order->created_at }}<br />
                    <b>Total:</b> ${{ $order->total }}<br />
                    <table class="table table-bordered table-striped text-left mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Item ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price(PPQ)</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a class="link-success"
                                            href="{{ route('products.show', ['id' => $item->product->id]) }}">
                                            {{ $item->product->name }}
                                        </a>
                                    </td>
                                    <td>${{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ $item->quantity * $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                Seems to be that you have not purchased anything in our store =(.
            </div>
        @endforelse
    </div>
@endsection
