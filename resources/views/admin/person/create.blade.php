@extends('layout.admin')
@section('title', $viewData['title'])
@section('innerTitle', 'Register Person Information')
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Register Person Information
        </div>
        <div class="card-body col-7">
            <form method="POST" action="{{ route('admin.person.store') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('ID Number') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="id_number" value="{{ old('id_number') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('First Name') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="first_name" value="{{ old('first_name') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Father\'s Name') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="fat_name" value="{{ old('fat_name') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Grand Father\'s Name') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="gfat_name" value="{{ old('gfat_name') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Date Of Birth') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="dob" value="{{ old('dob') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Gender') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="gender" value="{{ old('gender') }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
