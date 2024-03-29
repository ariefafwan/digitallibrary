<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['user'];

    public function pinjam()
    {
        return $this->hasMany(Pinjam::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
