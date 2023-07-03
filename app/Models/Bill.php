<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table='bill';
    protected $fillable = [
        'id',
        'coin',
        'user_id',
      
        
    ];
 
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    
    
}
