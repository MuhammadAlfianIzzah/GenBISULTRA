<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = ["title", "slug", "content", "category_id", "hero", "thumbnail", "is_active", "user_id"];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function category_posts()
    {
        return $this->belongsTo(CategoryPosts::class, "category_id");
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->where(function ($query) use ($category) {
                $query->where('category_id', $category);
            });
        });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('content', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        });
    }
}
