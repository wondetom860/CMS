@extends('layout.mystore')
@section('title', "Account Management")
@section('subtitle', "Change Password")
@section('content')
    <div class="container">
        <div class="card col-4">
            <div class="card-header">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Change Password</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('myaccount.update.password') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name"><strong>Old Password:</strong></label>
                                <input type="password" name="oldp" id="oldp" placeholder="Password"
                                    class="form-control" value="{{ old('oldp') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="newp1"><strong>New Password:</strong></label>
                                <input type="password" name="newp1" id="newp1" placeholder="New Password"
                                    class="form-control" value="{{ old('newp1') }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="newp2"><strong>Confirm:</strong></label>
                                <input type="password" name="newp2" id="newp2" placeholder="Confirm"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center m-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
