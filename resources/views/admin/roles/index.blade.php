@extends('layout.adminLTE')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>{{__('Role Management')}}
                    @can('role-create')
                        <a class="btn btn-success register-caseType-btn" href="{{ route('admin.roles.create') }}">{{__('Create New Role')}}</a>
                    @endcan
                </h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>{{__('No')}}</th>
            <th>{{__('Name')}}</th>
            <th width="280px">{{__('Action')}}</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.roles.show', $role->id) }}">{{__('Show')}}</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role->id) }}">{{__('Edit')}}</a>
                    @endcan
                    @can('role-delete')
                        <form style="display:inline" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
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
    {!! $roles->render() !!}
@endsection
