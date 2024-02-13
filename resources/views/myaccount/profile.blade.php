@extends('layout.mystore')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-7 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Manage login account
                    </div>
                    <div class="card-body">
                        @include('myaccount.partials._change_user_name_form')
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        More
                    </div>
                    <div class="card-body">
                        <form action="{{ route('myaccount.update.password', ['id' => $viewData['profile']->id]) }}"
                            method="post">
                            @csrf
                            <button onclick="return confirm('Are you sure to reset your password?')" class="btn bg-warning"
                                type="submit">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
