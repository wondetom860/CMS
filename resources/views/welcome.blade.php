@extends('layout.mystore')
@section('content')
    <div class="container-fluid">
        <div class="row" style="min-height: 600px;">
            <div class="col-12 table-responsive">
                @include('case.partials._dashboard')
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        // console.log('Hi!');
    </script>
@stop
