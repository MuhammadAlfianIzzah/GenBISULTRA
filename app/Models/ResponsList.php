<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsList extends Model
{
    use HasFactory;
    protected $fillable = ["jawaban", "user_id", "idlist"];
}
