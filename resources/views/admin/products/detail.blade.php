@extends('layout.admin')
@section('title', 'Product Detail')
@section('subtitle', $product->name)
@section('content')
    <div class="container">
        <h3 class="float-right">
            Detail: {{ $product->name }} - Product page
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('/storage' . '/' . $product->image) }}" class="img-fluid rounded-start" style="width: 350px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $product['name'] }} (${{ $product->price }})
                        </h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><small class="text-muted">Add to Cart</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
