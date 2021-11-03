<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPenerima extends Model
{
    use HasFactory;
    protected $fillable = ["komsat_id", "devisi_id", "penerimaBeasiswa_id"];
}
