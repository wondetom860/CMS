
@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="">
        <div class="card">
            <h4 class="card-header">
                {{__('Staff Role - MOD-CCMS')}}
                @can('staff-role-create')
                    <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.staffrole.create') }}"
                        style="align-self: flex-end">{{__('Register New Staff Role')}}</a>
                @endcan
            </h4>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <th>{{__('ID')}}</th>
                        <th>{{__('Role Name')}}</th>
                        <th>{{__('Rank')}}</th>
                        <th>{{__('Description')}}</th>
                        <th>{{__('Show')}}</th>
                        <th>{{__('Update')}}</th>
                        <th>{{__('Delete')}}</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['staff_role'] as $staff_role)
                            <tr>
                                <td>{{ $staff_role->id }}</td>
                                <td>{{ $staff_role->role_name }}</td>
                                <td>{{ $staff_role->rank }}</td>
                                <td>{{ $staff_role->description }}</td>
                                <td><a href="{{ route('admin.staffrole.show', ['id' => $staff_role->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a></td>
                                <td>
                                    <a href="{{ route('admin.staffrole.edit', ['id' => $staff_role->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.staffrole.delete', ['id' => $staff_role->id]) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete court profile?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                                {{-- <td><a href="{{route('admin.staffrole.delete',['id' => $staff_role->id])}}" onclick="return confirm('Are you sure to remove an item?');">Delete</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
