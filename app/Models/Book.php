<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $with = ['kategori', 'author', 'penerbit'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function penerbit()
    {
        return $this->belongsTo(Publiser::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    
    public function getBookStokAttribute()
    {
        return $this->stock >= 1 ? 'tersedia' : 'kosong';
    }

    public function getBookImgAttribute()
    {
        return "/storage/" . $this->thumbnail;
    }
}
