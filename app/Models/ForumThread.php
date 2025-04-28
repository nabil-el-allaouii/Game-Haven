<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model
{
    public $fillable = ['title' , 'content','user_id','game_id','category','media'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
}
