<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::filter(request(['search']), true)->latest()->paginate(10);
    
        return view('dashboard.posts.index', [
            'title' => 'Dashboard News',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for c reating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', ['categories' => $categories]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
{
    $validatedData = $request->validated();
    
    $image = $request->file('image');
    $path = $image->store('img', 'public');
    $validatedData['image'] = $path;
    
    $validatedData['body'] = strip_tags($request->input('body'));
    $validatedData['author_id'] = auth()->user()->id;
    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
            
    Post::create($validatedData);
    
    return redirect('/dashboard/posts')->with('success', 'New post added');
}

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        // Ambil data yang sudah divalidasi
        $validatedData = $request->validated();
        $validatedData['body'] = strip_tags($request->input('body'));
    
        // Cek apakah ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete($post->image); // Hapus gambar lama jika ada
            }
            $validatedData['image'] = $request->file('image')->store('img');
        } else {
            $validatedData['image'] = $post->image; // Menggunakan gambar lama jika tidak ada gambar baru
        }
    
        // Jangan ubah slug, gunakan slug yang sudah ada
        $validatedData['slug'] = $post->slug;
    
        // Update data postingan
        Post::where('id', $post->id)
            ->update($validatedData);
    
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }


    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

}
