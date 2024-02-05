@extends('layout.app')
@section('title') Our Employees @endsection
@section('content')
   <div class="container info py-2">
       <div class="row">
           @foreach($contacts as $employee )
               <div class="card col-lg-3 col-md-3 col-sm-12 text-center mx-auto">
                   <img class="card-img-top rounded-circle" src="/images/<?= $employee['propic'] ?>" alt="Card image">
                   <div class="card-body">
                       <h4 class="card-title">{{$employee['name']}}</h4>
                       <br>
                       <h6>{{$employee['role']}} At {{$employee['company']}}</h6>
                       <p> <i> {{$employee['description']}} </i> </p>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
@endsection
