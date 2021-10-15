@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-md-8">
                <h3>{{ strtoupper($post->title) }}</h3>
                <h6>Posted by: 
                    <a href="{{ route('posts', ['author'=> $post->user->username]) }}" class="text-decoration-none">
                        {{ $post->user->name }} 
                    </a>
                    in 
                    <a href="{{ route('posts', ['category'=> $post->category->slug]) }}" class="text-decoration-none">
                        {{ $post->category->name }}
                    </a>
                    - {{ $post->created_at->diffForHumans() }}
                </h6>
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="img-fluid" 
                    alt="{{ $post->category->name }}">

                <article class="fs-6 my-3">
                    {!! $post->body !!}
                </article>
                <hr>
                <a href="{{ $url = route('posts') }}" class="text-decoration-none btn btn-primary">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection