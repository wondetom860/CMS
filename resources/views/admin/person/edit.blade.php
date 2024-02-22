@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header"> Edit Person Information - <i>{{ $viewData['person']->getFullName() }}</i>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.person.update', ['id' => $viewData['person']->id]) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Court') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <select name="court_id" id="court_id" class="form-control">
                                    @foreach ($viewData['courts'] as $court)
                                        <option value="{{ $court->id }}">{{ $court->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label
                                class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('ID Number') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="id_number" value="{{ $viewData['person']->id_number }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label
                                class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('First Name') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="first_name" value="{{ $viewData['person']->first_name}}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label
                                class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Father\'s Name') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="fath_name" value="{{ $viewData['person']->fath_name }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label
                                class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Grand Father\'s Name') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="gfath_name" value="{{ $viewData['person']->gfath_name }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label
                                class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Date Of Birth') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <input name="dob" value="{{ $viewData['person']->getDate() }}" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label
                                class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Gender') }}:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <select class="form-control" name="gender" required>
                                    <option value="">Please select gender</option>
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                </select>
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
