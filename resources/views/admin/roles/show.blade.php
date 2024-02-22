@extends('layout.adminLTE')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>Show Role<a class="btn btn-primary register-caseType-btn" href="{{ route('admin.roles.index') }}"> Back</a></h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                        <label class="badge rounded-pill bg-success">{{ $v->name }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
