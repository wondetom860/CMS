@extends('layout.admin')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
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
                        <p class="card-text">Rank: {{ $viewData['person']->rank }}</p>
                        <p class="card-text">Login Credentials: <?= $viewData['person']->getLoginCreds() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.signupUser = (person_id) => {

            $.ajax({
                url: "{{ route('admin.person.signup') }}",
                type: "post",
                data: $('#form_1').serialize(),
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);

                }
            });
        }
    </script>
@endsection
