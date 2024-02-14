<form action="{{ route('myaccount.update.password') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name"><strong>Old Password:</strong></label>
                <input type="text" name="oldp" id="oldp" placeholder="Password" class="form-control"
                    value="{{ old('oldp') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="newp1"><strong>New Password:</strong></label>
                <input type="text" name="newp1" id="newp1" placeholder="New Password" class="form-control"
                    value="{{ old('newp1') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="newp2"><strong>Confirm:</strong></label>
                <input type="text" name="newp2" id="newp2" placeholder="Confirm" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center m-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
