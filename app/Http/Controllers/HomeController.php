<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function Games()
    {
        $games = Game::with('genres')->limit(4)->get();
        return view('index', compact('games'));
    }
    public function listing()
    {
        $games = Game::with('genres', 'platforms')->paginate(8);
        return view('games_list', compact('games'));
    }
    public function details(string $id)
    {
        $game = Game::with('screenshots')->findOrFail($id);
        $title = $game->gameTitle;
        $similarGames = Game::where('id','!=',$id)->inRandomOrder()->limit(2)->get();
        $file = file_get_contents(storage_path('app/public/applist.json'));
        $dataFile = json_decode($file, true)['applist']['apps'] ?? [];
        $match = collect($dataFile)->first(function ($data) use ($title) {
            return strtolower($data['name']) === strtolower($title);
        });
        $requirements = [];
        if ($match) {
            $appid = $match['appid'];
            $response = Http::get("https://store.steampowered.com/api/appdetails?appids=" . $appid);
            $gameData = $response->json();
            $gameinfo = $gameData[$appid]['data']['pc_requirements'];
            $requirements['info']= $gameinfo;
        }
        return view('game_details', compact('game','requirements','similarGames'));
    }
}
