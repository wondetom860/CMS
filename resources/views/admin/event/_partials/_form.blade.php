<div class="card mb-4">
    <div class="card-header"> Register New event
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.event.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label class="text-right col-lg-4 col-md-4 col-sm-12 col-form-label">Event Type:</label>
                        <div class="col-lg-8 col-md-8 col-sm-12 text-left">
                            <select name="event_type_id" id="event_type_id" class="form-select">
                                @foreach (App\models\EventType::all() as $eType)
                                    <option value="{{ $eType->id }}">{{ $eType->event_type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label class="text-right col-lg-4 col-md-4 col-sm-12 col-form-label">Date:</label>
                        <div class="col-lg-8 col-md-8 col-sm-12 text-left">
                            <input name="date_time" type="date" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label class="text-right col-lg-4 col-md-4 col-sm-12 col-form-label">Location:</label>
                        <div class="col-lg-8 col-md-8 col-sm-12 text-left">
                            <input name="location" value="{{ old('location') }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-4 row">
                        <label class="text-right col-lg-4 col-md-4 col-sm-12 col-form-label">Outcome:</label>
                        <div class="col-lg-8 col-md-8 col-sm-12 text-left">
                            <input name="out_come" value="{{ old('out_come') }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <input type="hidden" name="case_id" value="{{$case->id}}" class="d-none">
                    <button type="submit" class="btn btn-primary float-right btn-sm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
