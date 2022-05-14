<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class ArticleController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'title' => 'Welcome to the homepage',
            'articles' => Article::main()->filter()->simplePaginate(9)->appends(request()->query()),
            'categories' => Category::all(),
            'advs' => Adv::all(),
            'trending' => Article::main()->trending()->take(5),
        ]);
    }
    public function show(Article $article)
    {
        return view('article', [
            'title' => $article->title,
            'article' => $article->load('author', 'category'),
            'category' => $article->category,
            'articles' => Article::with(['author', 'category'])->latest()->get(),
            'advs' => Adv::all(),
        ]);
    }
    public function trending()
    {
        return view('trending', [
            'title' => 'Trending articles',
            'articles' => Article::with(['author', 'category'])->trending()->limit(5)->get(),
            'categories' => Category::all(),
            'articles_all' => Article::with(['author', 'category'])->latest('published_at')->get(),
            'advs' => Adv::all(),
        ]);
    }
}