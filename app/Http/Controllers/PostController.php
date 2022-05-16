<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $validated['image'] = $request->file('image')->store('public/img/posts');
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
            'slug' => 'required|unique:articles|max:255',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'captions' => 'max:255',
        ]);

        Article::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
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
        //
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
        //
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
        Article::destroy($article->id);
        return redirect()->route('article.index');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function all()
    {
        $this->authorize('admin');
        return view('dashboard.all', [
            'articles' => Article::all(),
        ]);
    }
}