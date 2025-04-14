<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameScreenshot extends Model
{
    protected $fillable = ['screenshot'];
    protected $table = 'gameScreenshots';
    public function game(){
        return $this->belongsTo(Game::class);
    }
}
