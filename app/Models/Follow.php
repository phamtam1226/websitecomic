<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    protected $table = 'follow';
    protected $fillable = [
        'comic_id',
        'user_id'
    ];

    public function Comic(){
        return $this->belongsTo('App\Models\Comic', 'comic_id', 'id');
    }

    public function User(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    // public function genres()
    // {
    //     return $this->belongsToMany(Genre::class);
    // }

    // public function chapters()
    // {
    //     return $this->hasMany(Chapter::class);
    // }
}
