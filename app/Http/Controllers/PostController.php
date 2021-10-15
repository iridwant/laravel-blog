<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() {
        $header = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'))->name;
            $header = ' in ' . $category;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'))->name;
            $header = ' by ' . $author;
        }

        return view('posts', [
            'title' => 'Posts',
            'header' => 'All Posts' . $header,
            'posts' => Post::latest()->search(request(['search']))
                ->categorySearch(request(['category']))
                ->authorSearch(request(['author']))
                ->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            'title' => 'Article',
            'post' => $post->load(['user','category'])
        ]);
    }
}
