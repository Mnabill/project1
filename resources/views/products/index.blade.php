@extends('layout.prolayout')

@section('content')


    <div class="jumbotron text-center" >
        <h1 class="display-4">Hello, Dear!</h1>
       
        <hr class="my-4">
        <p> You Can Create Post Or See The Posts</p>
        <a class="btn btn-primary btn-lg" href="posts/create" role="button">Create Post</a>
        <a class="btn btn-success btn-lg" href="/posts" role="button">Desplay Posts</a>
      </div>

@endsection