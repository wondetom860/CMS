@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['title'])
@section('content')
    <div class="">
        <div class="card">
            <h4 class="card-header">
                {{__('Party Types - Admin Panel')}}
                <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.party_type.create') }}"
                    style="align-self: flex-end">{{__('Register New Party Type')}}</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>{{__('ID')}}</th>
                        <th>{{__('Party Type')}}</th>
                        <th>{{__('Description')}}</th>
                        <th>{{__('Show')}}</th>
                        <th>{{__('Update')}}</th>
                        <th>{{__('Delete')}}</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['party_type'] as $pt)
                            <tr>
                                <td>{{ $pt->id }}</td>
                                <td>{{ $pt->party_type_name }}</td>
                                <td>{{ $pt->description }}</td>
                                <td><a href="{{ route('admin.party_type.show', ['id' => $pt->id]) }}">{{__('Show')}}</a></td>
                                <td>
                                     <a href="{{ route('admin.party_type.edit', ['id' => $pt->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a> 
                                </td>
                                <td>
                                     <form action="{{ route('admin.party_type.delete', ['id' => $pt->id]) }}" method="get">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure you want to delete party_type profile?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form> 
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
