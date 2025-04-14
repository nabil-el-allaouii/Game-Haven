<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameGenre extends Model
{
    protected $fillable = ['genre'];
    protected $table = 'gameGenres';
    public function game(){
        return $this->belongsTo(Game::class);
    }
}
