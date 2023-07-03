<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table='comment';
    protected $fillable = [
        'id',
        'chapter_id',
        'user_id',
        'comic_id',
        'user_name',
        'user_email',
        'total_cmtreply',
        'content',
        'status',
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
