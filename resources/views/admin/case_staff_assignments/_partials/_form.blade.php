<div class="card-header"> Assign Court Staff to a Case
</div>
<div class="card-body">
    <form method="POST" action="{{ route('admin.case_staff_assignments.store') }}" id="csa_form">
        @csrf
        @php
            $user = App\Models\User::findOrFail(Auth::user()->id);
        @endphp
        <div class="row">
            <div class="col">
                <div class="mb-4 row">
                    <label for="court_staff_id" class="text-left col-lg-12 col-md-12 col-sm-12 col-form-label">Select
                        Staff:</label>
                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                        <select name="court_staff_id" id="court_staff_id" class="form-control">
                            @foreach ($viewData['court_staff'] as $staff)
                                @if ($staff->person_id != $user->person_id)
                                    <option value="{{ $staff->id }}">{{ $staff->getStaffDetail() }} -
                                        {{ $staff->staffrole->role_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <input type="hidden" name="case_id" class="hidden" value="{{ $viewData['case']->id }}">
                <input type="hidden" name="pop_up" class="hidden" value="1">
                <button class="btn btn-primary" type="submit" onclick="submitCsaForm();return false;">Submit</button>
            </div>
        </div>
    </form>
</div>
