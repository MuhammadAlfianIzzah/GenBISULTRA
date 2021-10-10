<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ["nama", "foto_profile", "slug", "hero", "biodata", "user_id", "headline"];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
