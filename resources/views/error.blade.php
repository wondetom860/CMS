@extends('layout.error')
@section('title', "Error Page")
@section('content')
    <div class="container-fluid d-flix align-items-center flex-column py-5">
        <div class="alert alert-danger">
            {{ $message ?? "Such item does NOT exists" }}
            <a href="{{ url()->previous() }}" class="btn btn-link">Back</a>
        </div>
    </div>
@endsection
