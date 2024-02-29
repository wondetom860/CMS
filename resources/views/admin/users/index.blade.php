@extends('layout.adminLTE')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>{{__('Users Management')}}
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
            <th>{{__('No')}}</th>
            <th>{{__('ID Number')}}</th>
            <th>{{__('Name')}}</th>
            <th>{{__('Staff Role')}}</th>
            <th>{{__('Email')}}</th>
            <th>{{__('Access Roles')}}</th>
            <th width="280px">{{__('Action')}}</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->getIdNumber() }}</td>
                <td>{{ $user->getFullName() }}</td>
                <td><?= $user->getStaffRole() ?></td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge rounded-pill bg-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.users.show', $user->id) }}">{{__('Show')}}</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">{{__('Edit')}}</a>
                    @endcan
                    @can('role-delete')
                        <form style="display:inline" action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('POST')
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
