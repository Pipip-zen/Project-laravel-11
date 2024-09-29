<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(12)->withQueryString() ]);
    }

    public function show(Post $post) {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }

}
