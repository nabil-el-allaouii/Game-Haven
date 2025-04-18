<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:games,gameTitle'],
            'releaseDate' => ['required', 'date'],
            'price' => ['required', 'numeric'],
            'rating' => ['required', 'numeric'],
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
    public function showGames()
    {
        $games = Game::with('genres')->get();
        return view('admin.dashboard', compact('games'));
    }
    public function destroy($id)
    {
        $game = Game::find($id);
        $game->delete();
        return redirect('/admin');
    }
    public function editGame($id)
    {
        $game = Game::with('screenshots')->find($id);
        return view('admin.edit_game', compact('game'));
    }
    public function update(Request $request, $id)
    {
        $game = Game::find($id);
        $validated = $request->validate([
            'price' => ['numeric', 'required']
        ]);
        $screenshotUrls = [];
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $imageName = Str::uuid().'.'.$screenshot->getClientOriginalExtension();
                $screenshot->storeAs('screenshots',$imageName,'public');
                $path = '/screenshots/'.$imageName;
                $screenshotUrls[]= $path;
            }
        }
        $game->update([
            'price' => $request->price
        ]);
        foreach ($screenshotUrls as $url) {
            $game->screenshots()->create([
                'screenshot' => $url
            ]);
        }
        return redirect('/admin');
    }
}
