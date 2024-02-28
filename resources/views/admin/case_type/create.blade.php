@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('innerTitle', 'Create Case Type')
@section('content')
    <div class="card mb-4">
        <div class="card-header bg-light">{{ __('Create Case Type') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.case_type.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class=" col-form-label">{{ __('Case Type') }}:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="case_type_name" value="{{ old('case_type_name') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="form-label">{{ __('Description') }}:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
        </div>
    </div>
@endsection
