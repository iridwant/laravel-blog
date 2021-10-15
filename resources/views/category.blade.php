@extends('layouts.base')

@section('content')
    <h1>Post Category: {{ $title }}</h3>
    <article class="mt-5">
        @foreach ($posts as $post)
            <h3><a href="{{ route('posts') }}/{{ $post->slug }}">{{ $post->title }}</a></h3>
            <h5>{{ $post->author }} - {{ $post->published_at }}</h5>
            <p>{{ $post->excerpt }}</p>
        @endforeach
    </article>
    <hr>
    <a href="{{ $url = route('categories') }}">Back to Categories</a>
@endsection