@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-7 col-lg-7 col-sm-6">
                <div class="card">
                    <div class="card-header">
                       {{__('Manage login account')}} 
                    </div>
                    <div class="card-body">
                        @include('myaccount.partials._change_user_name_form')
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-6">
                <div class="card">
                    <div class="card-header">
                       {{__('Change Password')}} 
                    </div>
                    <div class="card-body">
                        @include('myaccount.partials._change_password_form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
