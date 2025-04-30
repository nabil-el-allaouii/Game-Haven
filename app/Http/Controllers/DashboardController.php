<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard(){
        $users = User::where('role','=','user')->get();
        $games = Game::with('genres')->paginate(8);
        return view('admin.dashboard', compact('users','games'));
    }
}
