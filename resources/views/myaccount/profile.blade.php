@extends('layout.mystore')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-7 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Profile
                    </div>
                    <div class="card-body">
                        <form action="{{ route('myaccount.update.profile', ['id' => $viewData['profile']->id]) }}"
                            method="post">
                            @csrf
                            <input type="text" class="form-control" name="name" value="{{ $viewData['profile']->name }}">
                            <br>
                            <button class="btn bg-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        More
                    </div>
                    <div class="card-body">
                        <form action="{{ route('myaccount.reset.password', ['id' => $viewData['profile']->id]) }}" method="post">
                            @csrf
                            <button onclick="return confirm('Are you sure to reset your password?')" class="btn bg-warning" type="submit">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
