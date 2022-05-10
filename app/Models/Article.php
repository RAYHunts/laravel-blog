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
        if (request('search')) {
            return $query->where('title', 'like', '%' . request('search') . '%')->orWhere('content', 'like', '%' . request('search') . '%');
        }
    }
    public function scopeTrending($query)
    {
        return $query->orderBy('views', 'desc')->where('published_at', '>=', now('month'))->published();
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
        return $query->with(['category', 'author'])->latest('updated_at', 'desc')->published();
    }
}