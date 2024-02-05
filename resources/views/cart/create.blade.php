@extends('layout.mystore')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                Purchase Completed
            </div>
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    Congratulations, purchase completed. order number is <b>#{{ $viewData['order']->id }}</b>
                </div>
            </div>
        </div>
    </div>

@endsection
