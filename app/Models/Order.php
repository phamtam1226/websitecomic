<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'quatity',
        'status',

    ];
    public function User()
    {
        return $this->belongsTo('App\Models\Account', 'user_id', 'id');
    }
    public function Food()
    {
        return $this->belongsTo('App\Models\Food', 'food_id', 'id');
    }
    public function Board()
    {
        return $this->belongsTo('App\Models\Board', 'board_id', 'id');
    }
}
