@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', $viewData['subtitle'])
@section('content')
    <div class="container d-flix align-items-center flex-column">
        <div class="card">
            <h4 class="card-header">
                events - Admin Panel - MOD-CCMS
                <a class="btn btn-primary btn-xs register-caseType-btn" href="{{ route('admin.event.create') }}"
                    style="align-self: flex-end">Register New event</a>
            </h4>
            <div class="card-body">
                <table class="table table-condensed table-hover table-sm table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Case number</th>
                        <th>Event type</th>
                        <th>Date </th>
                        <th>Location</th>
                        <th>Outcome</th>
                        <th>Show</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['event'] as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->case->case_number }}</td>
                                <td>{{ $event->eventType->event_type_name }}</td>
                                <td>{{ $event->date_time }}</td>
                                <td>{{ $event->location }}</td>    
                                <td>{{ $event->out_come }}</td>                            
                                <td><a href="{{ route('admin.event.show', ['id' => $event->id]) }}">Show</a></td>
                                <td>
                                    {{-- <a href="{{ route('admin.event.update', ['id' =>$event->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="bi-pencil"></i>
                                        </button>
                                    </a> --}}
                                </td>
                                <td>
                                    {{-- <form action="{{ route('admin.event.delete', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-cs btn-danger"
                                            onclick="return confirm('Are you sure to delete court profile?');">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form> --}}
                                </td>
                                {{-- <td><a href="{{route('admin.event.delete',['id' => $item->id])}}" onclick="return confirm('Are you sure to remove an item?');">Delete</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
