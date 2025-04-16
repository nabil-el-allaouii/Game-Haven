<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'releaseDate' => ['required', 'date'],
            'price' => ['required'],
            'rating' => ['required'],
            'screenshots' => ['required', 'array'],
            'genres' => ['required', 'array']
        ]);
        $game = Game::create([
            'gameTitle' => $request->name,
            'release' => $request->releaseDate,
            'cover' => $request->cover,
            'price' => $request->price,
            'rating' => $request->rating
        ]);
        foreach ($validated['screenshots'] as $url) {
            $game->screenshots()->create([
                'screenshot' => $url
            ]);
        }
        foreach ($validated['genres'] as $genre) {
            $game->genres()->create([
                'genre' => $genre
            ]);
        }
        return redirect('/add-game');
    }
    public function showGames(){
        $games = Game::with('genres')->get();
        return view('admin.dashboard', compact('games'));
    }
    public function destroy($id){
        $game = Game::find($id);
        $game->delete();
        return redirect('/admin');
    }
}
