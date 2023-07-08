<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['user_id','post_id','comment' , 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentreplies()
    {
            return $this->hasMany(CommentReply::class);
    }
}
