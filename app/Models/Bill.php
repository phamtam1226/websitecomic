<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bill';
    protected $fillable = [
        'board_id',
        'status',
        'board_number',
        'totalpice'


    ];
    public function food()
    {
        return $this->belongsToMany(Food::class, 'bill_food', 'bill_id', 'food_id');
    }

    public function Board()
    {
        return $this->belongsTo('App\Models\Board', 'board_id', 'id');
    }
}
