<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'comic_name',
        'description',
        'status',
        'cover_image',
        'number_comments',
        'number_views',
        'number_follows'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'comic_genre', 'comic_id', 'genre_id');
    }


    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
