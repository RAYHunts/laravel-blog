<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view(
            'dashboard.post',
            [
                'articles' => Article::where('user_id', auth()->id())->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'categories' => Category::all(),
            // 'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return ddd($request);
        $validated = $request->validate([
            // title unique
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'max:255',
        ]);
        $validated['slug'] = SlugService::createSlug(Article::class, 'slug', $validated['title']);
        $validated['image'] = $request->file('image')->store('img/posts');
        $validated['excerpt'] = Str::limit(strip_tags($request->content), 200);
        $validated['user_id'] = auth()->id();
        $validated['published_at'] = now();
        $validated['status'] = 'published';
        Article::create($validated);
        return redirect()->route('article.index');
    }

    public function draft(Request $request)
    {
        $request->validate([
            // title unique
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'captions' => 'max:255',
        ]);

        Article::create([
            'title' => $request->title,
            'slug' => SlugService::createSlug(Article::class, 'slug', $request->title),
            'content' => $request->content,
            'excerpt' => Str::limit(strip_tags($request->content), 200),
            'category' => $request->category,
            'image' => $request->image,
            'captions' => $request->captions,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view(
            'dashboard.show',
            [
                'article' => $article->load('author', 'category'),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view(
            'dashboard.edit-post',
            [
                'article' => $article,
                'categories' => Category::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            // title unique
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'max:255',
        ]);
        $validated['slug'] = SlugService::createSlug(Article::class, 'slug', $validated['title']);
        $validated['image'] = $request->file('image')->store('img/posts');
        $validated['excerpt'] = Str::limit(strip_tags($request->content), 200);
        $validated['user_id'] = auth()->id();
        $validated['published_at'] = now();
        $validated['status'] = 'published';
        // Article update
        Article::where('id', $article->id)->update($validated);
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // if ($article->image) {
        //     Storage::delete($article->image);
        // }
        if ($article->author->id === auth()->id() || auth()->user()->role === 'admin' || auth()->user()->role === 'developer') {
            Article::destroy($article->id);
            return back()->with('success', 'Article has been deleted');
        }
        return back()->with('error', 'You are not authorized to delete this article');
    }


    public function all()
    {
        $this->authorize('admin');
        return view('dashboard.all', [
            'articles' => Article::all(),
        ]);
    }
}