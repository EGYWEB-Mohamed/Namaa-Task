@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-secondary w-100" href="{{ route('front') }}">Back To All Blogs</a>
                    </div>
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset($blog->image) }}">
                        <hr>
                        <h1>{{ $blog->title }}</h1>
                        <br>
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

