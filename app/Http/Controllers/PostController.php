<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $posts = Post::filter(request(['search', 'category', 'author']), false)->latest()->paginate(10);

        $category = $request->input('category');
        $author = $request->input('author');
    
        $title = 'Halaman Blog';
    
        if ($category) {
            $categoryName = Category::where('slug', $category)->first()->name;
            $title = "Post berdasarkan kategori $categoryName";
        } elseif ($author) {
            $authorName = User::where('username', $author)->first()->name;
            $title = "Postingan oleh $authorName";
        }
    
        return view('posts', [
            'title' => $title,
            'posts' => $posts,
            'category' => $category,
            'author' => $author,
        ]);

        $posts = Post::latest()->take(6)->get();
        return view('home', compact('posts'));
    }

    public function show(Post $post) {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }

    
}
