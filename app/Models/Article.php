<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    protected $dates = [
        'published_at',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeFilter($query)
    {
        if (request()->has('search')) {
            $query->where('title', 'like', '%' . request()->get('search') . '%')
                ->orWhere('content', 'like', '%' . request()->get('search') . '%');
        }
        if (request()->has('category')) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', request()->get('category'));
            });
        }
        if (request()->has('author')) {
            $query->whereHas('author', function ($query) {
                $query->where('username', request()->get('author'));
            });
        }
        if (request()->has('sort')) {
            if (request()->get('sort') == 'oldest') {
                $query->oldest('published_at');
            } else if (request()->get('sort') == 'popular') {
                $query->latest('views');
            }
        } else {
            $query->latest('published_at');
        }
        return $query;
    }
    public function scopeTrending($query)
    {
        return $query->orderBy('views', 'desc')->where('published_at', '>=', now()->subDay())->take(5);
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
        return $query->with(['category', 'author'])->published();
    }
}