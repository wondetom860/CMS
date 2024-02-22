@extends('layout.adminLTE')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="bg-default">
                <h4>Edit User Role <b><i>{{ $user->getFullName() }}</i></b> <a
                        class="btn btn-primary register-caseType-btn" href="{{ route('admin.users.index') }}"> Back</a></h4>
            </div>
        </div>
    </div>
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
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $user->person_id }}" name="person_id" class="hidden">
        <div class="row">
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name"><strong>User Name:</strong></label>
                    <input type="text" user_name="user_name" id="name" placeholder="Name" class="form-control"
                        value="{{ $user->user_name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="text" name="email" id="email" placeholder="Email" class="form-control"
                        value="{{ $user->email }}">
                </div>
            </div> --}}
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password"><strong>Password:</strong></label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="confirm-password"><strong>Confirm Password:</strong></label>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password"
                        class="form-control">
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="roles"><strong>Role:</strong></label>
                    <select name="roles[]" class="form-control" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected' : '' }}>
                                {{ $role }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
