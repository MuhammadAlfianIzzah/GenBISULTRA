<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komisat extends Model
{
    protected $table = "komisats";
    use HasFactory;
    protected $fillable = ["nama", "keterangan"];
}
