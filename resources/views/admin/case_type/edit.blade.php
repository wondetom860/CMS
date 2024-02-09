@extends('layout.admin')
@section('title', $viewData['title'])
@section('content')
<div class="card mb-4">
    <div class="card-header"> Edit Case Type
    </div>
    <div class="card-body">
        @if ($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ route('admin.case_type.update', ['id' => $viewData['case_type']->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Case Type:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="case_type_name" value="{{ $viewData['case_type']->case_type_name }}" type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description"
                    rows="3">{{ $viewData['case_type']->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection