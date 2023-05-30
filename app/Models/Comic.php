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
        'cover_image'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
