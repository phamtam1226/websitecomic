<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = 'bill_detail';
    protected $fillable = [

        'bill_id',
        'order_id',

        'status',

    ];

    public function Bill()
    {
        return $this->belongsTo('App\Models\Bill', 'bill_id', 'id');
    }
    public function Board()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
}
