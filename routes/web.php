<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
});

// Apply the middleware to the routes
Route::middleware('admin.user')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::delete('/blog/media/{media}', [PostsController::class, 'deleteMedia'])->name('media.delete');
});

// Redirect legacy favicon.ico requests to new PNG
Route::get('/favicon.ico', function () {
    return redirect(asset('images/cherry_icon.png'));
});

// Display the perfume mixer page
Route::get('/perfume-mixer', [PerfumeMixerController::class, 'index']);

// Handle the mixing process and recommend a perfume
Route::post('/perfume-mixer/mix', [PerfumeMixerController::class, 'mix']);

// Save blend to user profile
Route::post('/perfume-mixer/save', [PerfumeMixerController::class, 'save'])->middleware('auth');