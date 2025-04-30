<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['rating','review','user_id','game_id'];
    public function gameReviews(){
        return $this->belongsTo(Game::class,'game_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
