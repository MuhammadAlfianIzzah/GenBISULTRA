<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListNote extends Model
{
    use HasFactory;
    protected $fillable = ["title", "deskripsi", "user_id"];
}
