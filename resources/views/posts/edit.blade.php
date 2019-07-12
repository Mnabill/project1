@extends('layout.prolayout')
@section('content')
    
    <form action="/posts"  method="POST" enctype="multipart/form-data" >
      @csrf
        <div class="form-group">
          <label >Enter Name</label>
          <input type="text" class="form-control"  name="name" placeholder="Enter Name Of Product" value="{{$post->name}}">
          <small  class="form-text text-muted">Make Yout Name Atrractive</small>
        </div>
        <div class="form-group">
            <label >Enter Details</label>
            <input type="text" class="form-control"  name="details" placeholder="Enter Details Of Product" value="{{$post->details}}">
            <small  class="form-text text-muted">Write About Pro</small>
          </div>

         
            <div class="form-group" >
              <label >UpLoad Image</label>
              <input type="file" class="form-control-file" name="cover_image">
            </div>
         

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection