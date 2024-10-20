<?php


use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/authors/{user:username}', [UserController::class, 'show']);

Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view(('dashboard.index'));
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories' , AdminCategoryController::class)->except('show')->middleware('isAdmin');

Route::get('/', [HomeController::class, 'index']);

