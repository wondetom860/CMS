@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', 'Create party Type')
@section('content')
    <div class="card mb-4">
        <div class="card-header">{{__('Create Party Type')}} 
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.party_type.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('Party Type')}}:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="party_type_name" value="{{ old('party_type_name') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
