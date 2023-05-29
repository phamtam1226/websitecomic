<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'comic_name',
        'genre_id',
        'description',
        'status',
        'cover_image'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
