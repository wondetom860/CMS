@extends('layout.adminLTE')
{{-- {{ $trail->push('Update', route('admin.role.edit')) }} --}}
{{ Breadcrumbs::render() }}
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>Edit Role<a class="btn btn-primary register-caseType-btn" href="{{ route('admin.roles.index') }}">
                        Back</a></h2>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="card card-default">
                <div class="card-header">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name"><strong>Name:</strong></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                                value="{{ $role->name }}">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label><strong>Permission:</strong></label>
                            <div class="col-5"
                                style="max-height: 300px; overflow-y: auto; padding: 3px; background-color:white;">
                                @foreach ($permission as $value)
                                    <label class="bg-default">
                                        <input type="checkbox" name="permission[]" value="{{ $value->name }}"
                                            class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                        {{ $value->name }}
                                    </label>
                                    <br />
                                @endforeach
                            </div>
                            <?php
                            // $length = count($permission);
                            // $permissions_per_card = ceil($length/4);
                            // foreach ($permission as $value) {
                            //     $count = 0;
                            //     $chkd = in_array($value->id, $rolePermissions);
                            //     $card = "<div class='card'>";
                            //     $card .= "<div class='card-header'>{Select Permission}</div>";
                            //     $card .= "<div class='card-body'>";
                            //         while ($count <= $permissions_per_card) {
                            //             $card .= "<label>
                            //                     <input type='checkbox' name='permission[]' value='{$value->name}' class='name' checked={$chkd}>
                            //                 </label>";
                            //             $count++;
                            //         }
                            //     $card .= "</div>";
                            //     $card .= "</div>";
                            //     echo $card;
                            // }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
