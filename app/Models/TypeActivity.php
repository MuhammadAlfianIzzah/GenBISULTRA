<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeActivity extends Model
{
    protected $fillable = ["nama"];
    protected $table = "type_activities";
    use HasFactory;
}
