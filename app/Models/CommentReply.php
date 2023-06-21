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
        'content_reply',
        'status',
        'comment_id',
        'userreply_id',
    ];
    public function Comment()
    {
        return $this->belongsTo('App\Models\Comment','comment_id','id');
    }
    public function User()
    {
        return $this->belongsTo('App\Models\User','userreply_id','id');
    }
}
