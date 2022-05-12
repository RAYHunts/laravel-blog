<?php

namespace App\Models;

use Clockwork\Storage\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    protected $dates = [
        'published_at'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function addViews()
    {
        $this->views += 1;
        $this->save();
    }
    public function scopeFilter($query)
    {
        if (request()->has('search')) {
            $search = request()->input('search');
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%");
        }
        if (request()->has('category')) {
            $category = request()->input('category');
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        }
        if (request()->has('author')) {
            $author = request()->input('author');
            $query->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            });
        }
        return $query;
        // if (request('search')) {
        //     return $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('content', 'like', '%' . request('search') . '%');
        // }
    }
    public function scopeTrending($query)
    {
        return $query->orderBy('views', 'desc')
            ->where('published_at', '>=', now()->subDays(14))
            ->published();
    }
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }
    public function scopeMain($query)
    {
        return $query->with(['category', 'author'])->latest('published_at', 'desc')->published()->filter(request(['search', 'category', 'author']));
    }
}