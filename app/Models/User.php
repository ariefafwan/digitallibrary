<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = [];
    protected $with = ['role'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function izin()
    {
        return $this->hasMany(Izin::class);
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }

    public function member()
    {
        return $this->hasMany(Member::class);
    }

    public function pinjam()
    {
        return $this->hasManyThrough(Member::class, Pinjam::class);
    }
}
