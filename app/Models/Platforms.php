<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

class Platforms extends Model
{
    protected $fillable = ['name' , 'game_id'];
    public function games(){
        return $this->belongsTo(Game::class);
    }
}
