<form action="{{ route('myaccount.update.username') }}" method="POST">
    @csrf
    <input type="text" name="id" value="{{ $id }}" class="hidden">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name"><strong>Old UserName:</strong></label>
                <input type="text" name="old" id="old" placeholder="User Name" class="form-control"
                    value="{{ old('old') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="new1"><strong>New User Name:</strong></label>
                <input type="text" name="new1" id="new1" placeholder="New User Name" class="form-control"
                    value="{{ old('new1') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="new2"><strong>Confirm:</strong></label>
                <input type="new2" name="new2" id="new2" placeholder="Confirm" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center m-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
