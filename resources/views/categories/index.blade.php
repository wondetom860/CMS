@extends('layout.mystore')
@section('title')
    Our Employees
@endsection
@section('content')
    <div class="container info py-2">
        <h3>Post Categories<a class="btn btn-xs warning float-right" href="{{ route('post.read_soft_delets') }}">Read Soft
                Deletes</a>
        </h3>
        <div class="row">
            <?php
            // echo '<pre>';
            // var_dump($contacts);
            // exit();
            // echo '</pre>';
            ?>
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-default m-2">
                        <h3 class="card-header">{{ $category->name }} <br><span style="font-size: 10pt;"><i> {{ $category->description }}
                                </i></span></h3>
                            <div class="card-body">
                                @if (($posts = $category->posts) !== null)
                                    @foreach ($posts as $post)
                                        <h4 class="bg-primary">{{$post->id}}.{{ $post->title }}</h4>
                                        <p>{{ $post->body }}</p>
                                        <hr>
                                    @endforeach
                                @else
                                @endif
                            </div>
                            <div class="card-footer">

                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
