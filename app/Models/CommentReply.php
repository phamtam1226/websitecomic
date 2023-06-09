<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;
    protected $table='commentreply';
    protected $fillable = [
        'id',
        'user_name',
        'user_email',
        'userreply_name',
        'content_reply',
        'status',
        'comment_id',
        'user_id',
       
    ];
    public function Comment()
    {
        return $this->belongsTo('App\Models\Comment','comment_id','id');
    }
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    
}
