@extends('layout.mystore')
@section('title', 'Products List')
@section('content')
    <div class="container-fluid d-flix align-items-center flex-column">
        <div class="row">
            @if (isset($products))
                @foreach ($products as $item)
                    <div class="col-md-4 col-lg-3 mb-2">
                        <div class="card mb-2">
                            <img src="{{ asset('/storage'."/" . $item['image']) }}" class="card-img-top img-card">
                            <div class="card-body text-center">
                                <a href="{{ route('products.show', ['id' => $item['id']]) }}"
                                    class="btn bg-primary text-white">{{ $item['name'] }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
