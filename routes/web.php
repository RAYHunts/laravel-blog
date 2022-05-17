<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;

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


// Route::resource('/dashboard/post', PostController::class)->middleware(['auth', 'verified']);

// Path: routes\web.php
Route::get('/', [ArticleController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified', 'developer'])->group(function () {
    Route::get('/migrate-fresh', function () {
        Artisan::call('migrate:fresh');
        return redirect()->back();
    });
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    Route::resource('/dashboard/article', PostController::class);
    Route::get('/dashboard/profile', [UserController::class, 'profile'])->name('profile');
});
Route::get('/carousel', function () {
    return view(
        'carousel',
        [
            'articles' => Article::with(['author', 'category'])->latest()->limit(5)->get(),
        ]
    );
})->name('carousel');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::resource('/dashboard/category', CategoryController::class);
    Route::resource('/dashboard/users', UserController::class);
    Route::get('/dashboard/all_articles', [PostController::class, 'all'])->name('all_articles');
    Route::get('/migrate-seed', function () {
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
        return 'migration success';
    });
});

require __DIR__ . '/auth.php';

Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('article');