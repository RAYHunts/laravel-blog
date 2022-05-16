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
        $heading = 'Welcome to My Blog';
        if (request()->has('category')) {
            $heading = Category::where('slug', request('category'))->first();
        }
        if (request()->has('author')) {
            $heading = User::where('username',  request('author'))->first();
        }
        return view('welcome', [
            'heading' => $heading,
            'articles' => Article::main()->filter(request(['search', 'category', 'author']))->Paginate(6)->appends(request()->query()),
            'advs' => Adv::all(),
        ]);
    }
    public function show(Article $article)
    {
        // add views
        $article->views += 1;
        $article->save();
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