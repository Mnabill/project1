@extends('layout.prolayout')
@section('content')

    <div class="card" style="width: 360px; height:360px;">
        
            
        @foreach ( $posts as $post )
        <div class="card-body">
            <h5 class="card-title">{{$post->name}}</h5>
            <p class="card-text">{{$post->details}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        @endforeach
  </div>
   
@endsection