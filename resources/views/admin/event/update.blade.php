@extends('layout.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Edit event Information
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.event.update', ['id' => $viewData['event']->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">case_id:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="case_id" value="{{ $viewData['event']->case_id }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">event_type_id:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="event_type_id" value="{{ $viewData['event']->event_type_id }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">date_time:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="date_time" value="{{ $viewData['event']->date_time }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">location:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="location" value="{{ $viewData['event']->location }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">out_come:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="out_come" value="{{ $viewData['event']->out_come }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="col"> &nbsp;
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ $viewData['event']->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
