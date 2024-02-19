<div class="card">
    <div class="card-header"> Register Person Information
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.person.store') }}" id="case_register_form">
            @csrf
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
                            <input name="id_number" id="id_number" value="{{ old('id_number') }}" type="text"
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
                            <input name="first_name" value="{{ old('first_name') }}" type="text"
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
                            <input name="fath_name" value="{{ old('fath_name') }}" type="text" class="form-control">
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
                            <input name="gfath_name" value="{{ old('gfath_name') }}" type="text"
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
                            <input name="dob" value="{{ old('dob') }}" type="date" class="form-control">
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
                            {{-- <input name="gender" value="{{ old('gender') }}" type="text" class="form-control"> --}}
                            <select class="form-control" name="gender" required>
                                <option value="">Please select gender</option>
                                <option value="MALE">Male</option>
                                <option value="FEMALE">Female</option>
                                {{-- @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label
                            class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('Role') }}:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            @if ($viewData['client_registration'] != 1)
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach ($viewData['staffrole'] as $staffrole)
                                        <option value="{{ $staffrole->id }}">{{ $staffrole->role_name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <input type="text" id='client_registration_id' name="client_registration"
                            value="{{ $viewData['client_registration'] }}" class="d-none">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
