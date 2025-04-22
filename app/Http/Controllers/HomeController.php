<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Games(){
        $games = Game::with('genres')->limit(4)->get();
        return view('index',compact('games'));
    }
    public function listing(){
        $games = Game::with('genres','platforms')->paginate(8);
        return view('games_list',compact('games'));
    }
}
