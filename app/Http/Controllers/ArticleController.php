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
            'articles' => Article::with(['category', 'author'])->latest('updated_at', 'desc')->published()->paginate(9),
            'categories' => Category::all(),
            'advs' => Adv::all(),
            'trending' => Article::with(['category', 'author'])->latest('updated_at', 'desc')->published()->take(3)->get(),
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
    public function findByCategory(Category $category)
    {
        return view('category', [
            'title' => $category->name,
            'articles' => $category->articles->load(['author', 'category']),
            'categories' => Category::all(),
            'articles_all' => Article::with(['author', 'category'])->latest()->get(),
            'advs' => Adv::all(),
        ]);
    }
    public function findByAuthor(User $author)
    {
        return view('author', [
            'title' => $author->name,
            'articles' => $author->articles->load('category', 'author')->orderBy('updated_at', 'desc'),
            'categories' => Category::all(),
            'articles_all' => Article::with(['author', 'category'])->latest('published_at')->get(),
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