<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    // public function brainPosts()
    // {
    //     return $this->belongsTo(BrainPost::class, "writer");
    // }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $name) {
            return $query->where(function ($query) use ($name) {
                $query->where('name', "like", "%$name%");
            });
        });
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function brainPosts()
    {
        return $this->hasMany(BrainPost::class);
    }
    public function posts()
    {
        return $this->hasMany(Posts::class);
    }
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
    public function profile()
    {
        return $this->hasOne(Profile::class, "user_id");
    }
    public function penerima()
    {
        return $this->hasOne(penerimaBeasiswa::class, "user_id");
    }
}
