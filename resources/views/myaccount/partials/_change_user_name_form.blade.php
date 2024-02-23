<form action="{{ route('myaccount.update.username') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name"><strong>{{__('Old UserName')}}:</strong></label>
                <input type="text" name="old" id="old" placeholder={{__('Old UserName')}} class="form-control"
                    value="{{ old('old') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="new1"><strong>{{__('New User Name')}}:</strong></label>
                <input type="text" name="new1" id="new1" placeholder={{__('New User Name')}} class="form-control"
                    value="{{ old('new1') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="new2"><strong>{{__('Confirm')}}:</strong></label>
                <input type="new2" name="new2" id="new2" placeholder={{__('Confirm')}} class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center m-2">
            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
        </div>
    </div>
</form>
