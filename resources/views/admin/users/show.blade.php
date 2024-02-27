@extends('layout.adminLTE')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="bg-default">
                <h2> {{__('User')}}<a class="btn btn-primary register-caseType-btn" href="{{ route('admin.users.index') }}">
                        {{__('Back')}}</a></h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('Name')}}:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('Email')}}:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{__('Roles')}}:</strong>
                @if (!empty($user->getRoleNames()))
                    @foreach ($user->getRoleNames() as $v)
                        <label class="badge rounded-pill bg-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
