@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="jumbotron text-center">
                            <h1 class="display-4">Hello, Dear!</h1>
                            <p class="lead">Wellcome to Our App</p>
                            <hr class="my-4">
                            <p>You Can Now go to Main Page</p>
                            <a class="btn btn-primary btn-lg" href="/" role="button">Posts</a>
                          </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
