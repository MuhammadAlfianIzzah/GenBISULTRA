<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPosts extends Model
{
    protected $fillable = ["name"];
    protected $table = "category_posts";
    use HasFactory;
}
