<form action="{{ route('myaccount.update.password') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name"><strong>{{__('Old Password')}} :</strong></label>
                <input type="text" name="oldp" id="oldp" placeholder={{__('Old Password')}} class="form-control"
                    value="{{ old('oldp') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="newp1"><strong>{{__('New Password')}} :</strong></label>
                <input type="text" name="newp1" id="newp1" placeholder={{__('New Password')}} class="form-control"
                    value="{{ old('newp1') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="newp2"><strong>{{__('Confirm')}} :</strong></label>
                <input type="text" name="newp2" id="newp2" placeholder={{__('Confirm')}} class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center m-2">
            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
        </div>
    </div>
</form>
