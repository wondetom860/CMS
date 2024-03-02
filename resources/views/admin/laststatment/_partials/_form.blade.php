<div class="container-fluid ">
    <div class="card mb-4">
        <div class="card-header">{{ __('Write Judgement Statement') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.laststatment.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-2 row">
                            <p class="text-mute">Case Number: {{$viewData['case']->case_number}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-2 row">
                            <label
                                class="text-left col-lg-12 col-md-12 col-sm-12 col-form-label">{{ __('Statment Description') }}:</label>
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <textarea rows="4" name="description" type="text" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-2 row">
                            <label
                                class="text-left col-lg-12 col-md-12 col-sm-12 col-form-label">{{ __('remark') }}:</label>
                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                <textarea rows="1" name="remark" type="text" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-2 row" style="float:right">
                            <input type="hidden" name="case_id" id="case_id" value="{{$viewData['case']->id}}">
                            <input type="hidden" name="pop_up" id="pop_up" value="1">
                            <button type="submit" class="btn btn-primary ">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>