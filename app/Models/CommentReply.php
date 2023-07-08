<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    protected $fillable=['user_id','comment_id','commentreply', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
