<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ScreenshotController;

Route::get('/', function () {
    return view('index');
});

Route::middleware('AlreadyAuth')->group(function () {
    Route::get('/login', function () {
        return view("auth.login");
    })->name("login");
    Route::get('/register', function () {
        return view("auth.register");
    });
});
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile');
});

Route::get('/admin',function(){
    return view('admin.dashboard');
});
Route::get('/admin',[GameController::class,'showGames'])->name('admin.games');

Route::get('/add-game' , function(){
    return view('admin.game_add');
});
Route::post('/add-game',[GameController::class,'store'])->name('add-game');
Route::delete('/admin/{id}',[GameController::class,'destroy'])->name('admin.games.destroy');
Route::get('/edit-game/{id}',[GameController::class , 'editGame'])->name('edit-game');
Route::delete('/edit-game/screenshot/{id}',[ScreenshotController::class,'destroy'])->name('Screenshot.destroy');
Route::put('/edit-game/{id}',[GameController::class,'update'])->name('Game.update');
