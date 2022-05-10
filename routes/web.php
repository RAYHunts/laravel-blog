<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

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

Route::get('/', [ArticleController::class, 'index']);
Route::get('/article/{article:slug}', [ArticleController::class, 'show']);
Route::get('/category/{category:slug}', [ArticleController::class, 'findByCategory']);
Route::get('/author/{author:username}', [ArticleController::class, 'findByAuthor']);
Route::get('/trending', [ArticleController::class, 'trending']);