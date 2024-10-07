<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $posts = Post::latest()->take(6)->get();
        return view('home', compact('title', 'posts'));
    }
}
