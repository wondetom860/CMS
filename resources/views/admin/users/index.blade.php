@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>Users Management
                    {{-- <a class="btn btn-success d-none register-caseType-btn" href="{{ route('users.create') }}"> Create New User</a> --}}
                </h2>
            </div>
        </div>
    </div>
    {{-- 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->getFullName() }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge rounded-pill bg-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.users.show', $user->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        <form style="display:inline" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->render() !!}
@endsection
