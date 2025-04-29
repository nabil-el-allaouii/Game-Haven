<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThreadReply extends Model
{
    protected $fillable = ['reply','user_id','forum_thread_id'];
    public function Thread(){
        return $this->belongsTo(ForumThread::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
