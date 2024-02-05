@extends('layout.mystore')
@section('title', 'Product Detail')
@section('subtitle', $product->name)
@section('content')
    <div class="container">
        <h3 class="float-right">
            Detail: {{ $product->name }} - Product page
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('/storage' . '/' . $product->image) }}" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $product['name'] }} (${{ $product->price }})
                        </h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">
                        <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-auto">
                                    <div class="input-group col-auto">
                                        <div class="input-group-text">Quantity</div>
                                        <input type="number" min="1" max="10"
                                            class="form-control quantity-input" name="quantity" value="1">

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary text-white" type="submit">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
