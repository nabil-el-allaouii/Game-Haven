<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteGameController extends Controller
{
    public function store(string $id){
        $user = Auth::user();
        $user->favorites()->syncWithoutDetaching([$id]);
        return redirect()->back();
    }
    public function destroy(string $id){
        $user = Auth::user();
        $user->favorites()->detach($id);
        return redirect()->back();
    }
}
