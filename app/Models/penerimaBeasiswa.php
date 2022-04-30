<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaBeasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        "nim", "fakultas", "jurusan", "tanggal_masuk", "tanggal_keluar", "no_hp",  "angkatan", "pembina", "foto_pengenal", "is_valid", "user_id"
    ];
    public function status()
    {
        return $this->hasOne(StatusPenerima::class, "penerimaBeasiswa_id");
    }
}
