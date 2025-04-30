<?php

namespace App\Http\Controllers;

use App\Models\ForumThread;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard(){
        $users = User::where('role','=','user')->get();
        $games = Game::with('genres')->paginate(8);
        $gamesCount = Game::count();
        $TotalThreads = ForumThread::count();
        return view('admin.dashboard', compact('users','games','gamesCount','TotalThreads'));
    }
    public function search(Request $request){
        $games = Game::where('gameTitle','LIKE','%'.$request->search.'%')->paginate(8);
        $users = User::where('role','=','user')->get();
        $gamesCount = Game::count();
        $TotalThreads = ForumThread::count();
        return view('admin.dashboard',compact('games','users','gamesCount','TotalThreads'));
    }
}
