<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['gameTitle','release','cover','rating','price'];
    
    public function screenshots(){
        return $this->hasMany(GameScreenshot::class);
    }
    public function genres(){
        return $this->hasMany(gameGenre::class);
    }
}
