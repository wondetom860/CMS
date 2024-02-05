@extends('layout.mystore')
@section('title')
    Our Employees
@endsection
@section('content')
    <div class="container info py-2">
        <h3>Posts<a class="btn btn-xs warning float-right" href="{{ route('post.read_soft_delets') }}">Read Soft Deletes</a>
        </h3>
        <div class="row">
            <?php
            // echo '<pre>';
            // var_dump($contacts);
            // exit();
            // echo '</pre>';
            ?>
            @foreach ($contacts as $post)
                <?php
                $bg = 'bg-default';
                $delBut = '';
                $restoreBut = '';
                if (!is_null($post->deleted_at)) {
                    $bg = 'bg-danger';
                    // $delBut = "";
                    $restoreBut = route('post.restore', ['id' => $post->id]);
                    $restoreBut = "<a href=\"$restoreBut\" class=\"btn btn-xs warning float-right\">Restore</a>";
                } else {
                    $bg = 'bg-default';
                    $delBut = route('post.soft_delete', ['id' => $post->id]);
                    $delBut = "<a class=\"btn btn-xs btn-warning float-right\" href=\"$delBut\">Soft Delete</a>";
                } ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card text-center m-2 {{ $bg }}">
                        <a href="{{ route('post.view', ['id' => $post->id]) }}">
                            <h3>{{ $post->id }}.{{ $post->title }}</h3>
                            <img class="img-fluid rounded"
                                src="{{ asset($post->postImage ? $post->postImage->url : '/images/no-image.jpeg') }}"
                                alt="Post Image" srcset="">
                        </a>
                        <?= $delBut . $restoreBut ?>
                        <div class="card-body">
                            <p style="text-align: left"> <i> {{ $post->body }} </i> </p>
                        </div>
                        <div class="card-footer">
                            <p>Category:
                                @if (($categories = $post->categories) !== null)
                                    @foreach ($categories as $category)
                                        <span class="bg-primary p-1">{{$category->name}}</span>|
                                    @endforeach
                                @else
                                    {{None}}
                                @endif

                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
