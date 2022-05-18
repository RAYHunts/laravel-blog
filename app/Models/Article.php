<?php

namespace App\Models;

use App\Models\Category;
use Clockwork\Storage\Search;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;




class Article extends Model
{
    use HasFactory, Sluggable;
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
            ->where('published_at', '>=', now()->subDays(90))->with([
                'category',
                'author',
            ])->published();
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
        return $query->with(['category', 'author'])->latest('published_at', 'desc')->published();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}