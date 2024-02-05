@extends('layout.admin')
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
                    <b>Order By: </b> {{ $order->user->name }}
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
                            <tr style="font-weight:bold; font-style: italic">
                                <td colspan="4" style="text-align: right;">
                                    Total Payable:
                                </td>
                                <td style="text-decoration: underline">
                                    ${{ sprintf('%0.3f', $order->total) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                Seems to be that there is no order request in our store =(.
            </div>
        @endforelse
    </div>
@endsection
