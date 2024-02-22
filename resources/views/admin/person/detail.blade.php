@extends('layout.adminLTE')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    {{-- <script type="module" src="{{ asset('/js/signupUser.js') }}"></script> --}}
    <div class="container">
        <h3 class="float-right">
            Detail: {{ $viewData['person']->getFullName() }} - Person page
        </h3>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 p-2 text-center">
                    <img src="{{ asset('/images/undraw_image.png') }}" class="img-fluid rounded-start"
                        style="width: 200px; height:auto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            Name: {{ $viewData['person']->getFullName() }}
                        </h5>
                        <p class="card-text">Age: {{ $viewData['person']->getAge() }}</p>
                        <p class="card-text">Court Staff: <?= $viewData['person']->getCourtSfatt() ?></p>
                        <p class="card-text">Login Credentials: <?= $viewData['person']->getLoginCreds(1) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="formModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="formModalLabel">Create Accout for
                        <i><u>{{ $viewData['person']->getFullName() }}</u></i>
                    </h4>
                </div>
                <div class="modal-body">
                    <form id="myForm" name="myForm" class="form-horizontal" method="POST">
                        @csrf
                        <input type="hidden" id="person_id" name="person_id" value="{{ $viewData['person']->id }}">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter username" value="{{ $viewData['person']->getRandomUserName() }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="choose Password" value="{{ $viewData['person']->getDefaultPassword() }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter email" value="">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter Phone" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add"
                        onclick="submitWebUserInfo();return false;">Create Account
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const signupUser = (person_id) => {
            $('#btn-save').val("add");
            $('#myForm').trigger("reset");
            $('#formModal').modal('show');
        }
        const submitWebUserInfo = () => {
            $.ajax({
                url: "{{ route('admin.person.signup') }}",
                type: "post",
                data: $('#myForm').serialize(),
                dataType: 'JSON',
                success: function(data) {
                    if (data == 1) {
                        window.location.href = window.location;
                    } else {
                        alert(data);
                    }
                }
            });
        }
    </script>
@endsection
