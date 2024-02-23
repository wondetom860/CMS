<div class="card mb-4">
    <div class="card-header bg-light"> Register New party
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.party.store') }}" id="party_register_form">
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">Case Number : {{ $viewData['case']->case_number }}</label>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4 row">
                            <label class="text-right col-lg-4 col-md-6 col-sm-12 col-form-label">Party Type </label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <select name="party_type_id" id="party_type_id" class="form-select">
                                    @foreach (App\models\partyType::all() as $party_type)
                                        <option value="{{ $party_type->id }}">{{ $party_type->party_type_name }}
                                        </option>
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
                                <input name="fath_name" value="{{ old('fath_name') }}" type="text"
                                    class="form-control">
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
                            <input type="text" id='client_registration_id' name="client_registration" value="1"
                                class="d-none">
                            <input type="text" id='case_id' name="case_id" value="{{ $viewData['case']->id }}"
                                class="d-none">
                            <button onclick="submitClientForm();return false;" type="submit"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
