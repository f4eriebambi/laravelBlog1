<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PerfumeMixerController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', [PagesController::class, 'pages.index']);
Route::get('/', function () {
    return view('pages.index'); // Points to resources/views/pages/index.blade.php
});

Route::resource('/blog', PostsController::class);

Auth::routes();

// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return view('pages.index');
});

Route::get('/about', function () {
    return view('pages.about');
});

// Apply the middleware to the routes
Route::middleware('admin.user')->group(function () {
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
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

// Display saved fragrance blends
Route::get('/fragrance-wardrobe', [PerfumeMixerController::class, 'wardrobe'])->middleware('auth');

// delete a saved fragrance blend
Route::delete('/fragrance-wardrobe/{blend}', [PerfumeMixerController::class, 'destroy'])->middleware('auth');

// Save a fragrance blend
Route::post('/save-blend', [PerfumeMixerController::class, 'saveBlend'])->middleware('auth');

// Display the contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');