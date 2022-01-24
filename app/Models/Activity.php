<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $fillable = ["nama", "slug", "hero", "thumbnail", "body", "user_id", "type_kegiatan", "TA_id", "devisi_id", "is_active"];
    use HasFactory;
    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
    protected $table = "activities";
    public function typeKegiatan()
    {
        return $this->belongsTo(TypeActivity::class, "TA_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function devisi()
    {
        return $this->belongsTo(Devisi::class, "devisi_id");
    }
    public function typeActivity()
    {
        return $this->belongsTo(TypeActivity::class, "TA_id");
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->where(function ($query) use ($category) {
                $query->where('TA_id', $category);
            });
        });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('body', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['devisi'] ?? false, function ($query, $dv) {
            return $query->where(function ($query) use ($dv) {
                $query->where('devisi_id', 'like', '%' . $dv . '%');
            });
        });
    }
}
