<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
// dashboard
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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

Route::get('/hello', function () {
    return view('hello', [
        'name' => 'Taylor',
        'categories' => Category::all(),
        'articles' => Article::all(),
        'users' => User::all(),
    ]);
});
Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/trending', [ArticleController::class, 'trending'])->name('trending');


// Route::middleware('guest')->group(function () {
//     Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
//     Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
// });

// Route::middleware('auth')->group(function () {
//     // dashboard
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::get('/logout', [UserController::class, 'logout'])->name('logout');
//     Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
//     Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
//     Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
//     Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
//     Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
//     Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
// });
Auth::routes(['verify' => true]);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');
require __DIR__ . '/auth.php';

Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
// hello