<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrainPost extends Model
{
    protected $fillable = ["title", "slug", "content", "thumbnail", "user_id", "category", "approval", "hero"];
    // protected $guarded = [];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->where(function ($query) use ($category) {
                $query->where('category', $category);
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
