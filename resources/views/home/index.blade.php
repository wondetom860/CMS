@extends('layout.mystore')
@section('title', $viewData['title'])
@section('content')
    <div class="container-fluid d-flix align-items-center flex-column">
        <div class="row p1" style="margin-bottom: 15%">
            <div class="col-3">
                <div class="card bg-primary">
                    <div class="cadr-header">
                        <h3 class="p2">Courts <a class="pull-right"
                                href="{{ route('courts.index') }}">{{ $viewData['courts_count'] }}</a></h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
