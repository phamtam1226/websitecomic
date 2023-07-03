<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table='history';
    protected $fillable = [
        'id',
        'status',
        'chapter_id',
        'user_id',
        'comic_id',
        
    ];
    public function Chapter(){
        return $this->belongsTo('App\Models\Chapter', 'chapter_id', 'id');
    }
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function Comic()
    {
        return $this->belongsTo('App\Models\Comic','comic_id','id');
    }
    
}
