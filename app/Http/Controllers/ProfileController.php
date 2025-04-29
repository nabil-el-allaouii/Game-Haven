<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile(){
        $user = Auth::user();
        $favorites = $user->favorites;
        $threads = $user->threads;
        return view('profile.profile',compact('favorites','threads'));
    }
}
