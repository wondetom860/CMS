@extends('layout.mystore')
@section('title')
    Post : {{ $post->title }}
@endsection
@section('content')
    <div class="container info py-2">
        <div class="row align-content-center">
            <?php
            // echo '<pre>';
            // var_dump($contacts);
            // exit();
            // echo '</pre>';
            ?>
            <h3>About Post: {{ $post->title }}</h3>
            <div class="card col-lg-4 col-md-4 col-sm-12 text-center mx-auto">
                <h3>{{ $post->title }}</h3>
                <div class="card-body">
                    <p> <i> {{ $post->body }} </i> </p>
                </div>
            </div>
        </div>
    </div>
@endsection
