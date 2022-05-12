<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Adv;
use App\Models\User;

class ArticleController extends Controller
{
    public function index()
    {
        $title = 'All Articles';
        $articles = Article::main();
        $categories = Category::all();
        $adv = Adv::all();
        if (request()->has('category')) {
            $category = Category::firstWhere('slug', request()->category);
            $title = 'All articles in the ' . $category->name . ' category';
        }
        if (request()->has('search')) {
            $title = 'Search results for: ' . request()->search;
        }
        if (request()->has('author')) {
            $author = User::firstWhere('username', request()->author);
            $title .= ' by ' . $author->name;
        }
        return view(
            'layouts.index',
            [
                'articles' => $articles->paginate(9)->withQueryString(),
                'categories' => $categories,
                'advs' => $adv,
                'title' => $title
            ]
        );
        // return view('welcome', [
        //     'title' => $title,
        //     'articles' => Article::main()->paginate(9)->appends(request()->query()),
        //     'categories' => Category::all()->append(request()->query()),
        //     'advs' => Adv::all(),
        //     'trending' => Article::main()->get(),
        // ]);
    }
    public function show(Article $article)
    {
        $article->addViews();
        return view('layouts.show', [
            'title' => $article->title,
            'article' => $article->load('author', 'category'),
            // 'category' => $article->category,
            'categories' => Category::all(),
            'articles' => Article::main()->get(),
            'advs' => Adv::all(),
        ]);
    }
    public function trending()
    {
        return view('layouts.trending', [
            'title' => 'Trending articles',
            'articles' => Article::trending()->main()->get(),
            'categories' => Category::all(),
            'articles_all' => Article::main()->get(),
            'advs' => Adv::all(),
        ]);
    }
}