@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="">
        <div class="card">
            <h4 class="card-header">
                {{__('Case Types - MOD-CCMS')}}
                <a class="btn btn-primary btn-xs register-caseType-btn float-right" href="{{ route('admin.case_type.create') }}"
                    style="align-self: flex-end">{{__('Register New Case Type')}}</a>
            </h4>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <th>{{__('ID')}}</th>
                        <th>{{__('Case Type')}}</th>
                        <th>{{__('Description')}}</th>
                        <th>{{__('Show')}}</th>
                        <th>{{__('Update')}}</th>
                        <th>{{__('Delete')}}</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['case_type'] as $ct)
                            <tr>
                                <td>{{ $ct->id }}</td>
                                <td>{{ $ct->case_type_name }}</td>
                                <td>{{ $ct->description }}</td>
                                <td><a href="{{ route('admin.case_type.show', ['id' => $ct->id]) }}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a></td>
                                <td>
                                    <a href="{{ route('admin.case_type.edit', ['id' => $ct->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a> 
                                </td>
                                <td>
                                     <form action="{{ route('admin.case_type.delete', ['id' => $ct->id]) }}" method="get">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete case_type profile?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form> 
                                </td>
                                 <!-- <td><a href="{{route('admin.case_type.delete',['id' => $ct->id])}}" onclick="return confirm('Are you sure to remove an case_type?');">Delete</a></td>  -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
