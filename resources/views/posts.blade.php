@extends('layouts.base')

@section('title', 'Blog')
@section('content')
<h1 class="text-center mb-3">{{ $header }}</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="posts">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @elseif (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-4">
                <input type="text" class="form-control" placeholder="Search posts" name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count())
    <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top img-fluid"
            alt="{{ $posts[0]->category->slug }}">
        <div class="card-body text-center">
            <p class="card-text">
                <small class="text-muted">
                    By <a href="{{ route('posts', ['author'=> $posts[0]->user->username]) }}"
                        class="text-decoration-none">
                        {{ $posts[0]->user->name }}
                    </a> in <a href="{{ route('posts', ['category' => $posts[0]->category->slug]) }}"
                        class="text-decoration-none">
                        {{ $posts[0]->category->name }}
                    </a>
                    - {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <h3 class="card-title">
                <a href="{{ route('posts') }}/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                    {{ strtoupper($posts[0]->title) }}
                </a></h3>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="{{ route('posts') }}/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">
                Read more
            </a>
        </div>
    </div>

    <article class="mt-5">
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                            <a href="{{ route('posts', ['category' => $post->category->slug]) }}" class="text-decoration-none text-white">
                                {{ $post->category->name }}
                            </a>
                        </div>
                        <img src="https://source.unsplash.com/800x600/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('posts') }}/{{ $post->slug }}" class="text-decoration-none">
                                    {{ strtoupper($post->title) }}
                                </a>
                            </h5>
                            <small class="text-muted">
                                By <a href="{{ route('posts', ['author'=> $post->user->username]) }}"
                                    class="text-decoration-none">
                                    {{ $post->user->name }}</a>
                                - {{ $post->created_at->diffForHumans() }}
                            </small>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="{{ route('posts') }}/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </article>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@else
    <p class="text-center fs-3">No Posts Found!</p>
@endif


@endsection
