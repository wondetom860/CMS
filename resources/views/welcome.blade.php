@extends('layout.mystore')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 table-responsive">
                @include('case.partials._dashboard')
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
