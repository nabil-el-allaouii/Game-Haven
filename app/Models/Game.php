<?php

namespace App\Models;

use App\Models\Platforms;
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
    public function platforms(){
        return $this->hasMany(Platforms::class);
    }
    public function reviews(){
        return $this->hasMany(Rating::class);
    }
    public function threads(){
        return $this->hasMany(ForumThread::class);
    }
}
