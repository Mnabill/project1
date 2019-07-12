@extends('layout.prolayout')
@section('content')
 <div class="container">

    <div class="row">
        @foreach ($posts as $post)
            
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/cover_image/'.$post->cover_image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{$post->name}}</h5>
                        <p class="card-text">{{$post->details}}</p>
                        <a href="posts/{id}" class="btn btn-primary">Show Me</a>
                        <a href="posts/{id}" class="btn btn-danger">Delete</a>
                        <a href="posts/{id}/edit" class="btn btn-warning">Edit</a>
                </div>
             </div>

            </div>
        @endforeach   
    
      
 </div>
@endsection