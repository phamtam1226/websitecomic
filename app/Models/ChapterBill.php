<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterBill extends Model
{
    use HasFactory;
    protected $table='chapter_bill';
    protected $fillable = [
        'id',
        'total_coin',
        'user_id',
        'chapter_id',
      
        
    ];
 
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function Chapter()
    {
        return $this->belongsTo('App\Models\Chapter','chapter_id','id');
    }
    
    
    
}
