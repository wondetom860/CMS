<div class="card-header"> Add Archive File
</div>
<div class="card-body">
    <form method="POST" action="{{ route('admin.case_archive.store') }}" id="archive_form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-2 row">
                    <label class="text-left pl-3 col-lg-12 col-md-12 col-sm-12 col-form-label">{{ __('Case Number') }} : {{ $viewData['case']->case_number }}</label>   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-2 row">
                    <label class="text-left pl-5 col-lg-12 col-md-12 col-sm-12 col-form-label">{{ __('Event')}} : {{ $viewData['event']->eventType->event_type_name }}|{{ $viewData['event']->getDate() }}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-4 row">
                    <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('File') }}:</label>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-4 row">
                    <label
                        class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Description') }}:</label>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                        <textarea name="description" rows="2" class="form-control">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-4 row">
                    <label class="text-right col-lg-2 col-md-4 col-sm-12 col-form-label">{{ __('Remark') }}:</label>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-left">
                        <textarea name="remark" rows="2" class="form-control">{{ old('remark') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <input type="hidden" name="case_id" class="hidden" value="{{ $viewData['case']->id }}">
                <input type="hidden" name="event_id" class="hidden" value="{{ $viewData['event']->id }}">
                <input type="hidden" name="pop_up" class="hidden" value='1'>
                <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>

                {{--  onclick="submitArchiveForm();return false;" --}}
            </div>
        </div>
    </form>
</div>
