<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteGameController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreenshotController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ThreadReplyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInteractionsController;
use League\Uri\Contracts\UserInfoInterface;

Route::get('/', [HomeController::class , 'Games']);
Route::get('/games',[HomeController::class , 'listing']);
Route::get('/game/{id}' , [HomeController::class , 'details']);
Route::get('/search' , [HomeController::class , 'search'])->name('game.search');
Route::get('/filter', [HomeController::class, 'ratingFilter'])->name('rate.filter');
Route::get('/platform' , [HomeController::class , 'platformFilter'])->name('platform.filter');
Route::get('/price' , [HomeController::class , 'priceFilter'])->name('price.filter');

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
    Route::get('/profile', [ProfileController::class , 'showProfile'])->name('profile')->middleware('user');
    Route::post('/game/{id}' , [UserInteractionsController::class , 'review'])->name('game.review');
    Route::delete('/review/{id}' , [UserInteractionsController::class , 'deleteReview'])->name('review.destroy');
    Route::get('/forum',[ForumController::class , 'ShowForum'])->name('forum.show');
    Route::get('/thread' , [ThreadController::class , 'viewAddThread']);
    Route::post('/thread' , [ThreadController::class , 'store'])->name('thread.store');
    Route::get('/thread/{id}',[ThreadController::class ,'viewContent'])->name('thread.content');
    Route::delete('/thread/{id}' ,[ThreadController::class , 'destroy'])->name('thread.destroy');
    Route::post('/thread/{id}' , [ThreadReplyController::class , 'store'])->name('reply.thread');
    Route::delete('/reply/{id}',[ThreadReplyController::class,'destroy'])->name('reply.destroy');
    Route::post('/game/{id}/favorite' , [FavoriteGameController::class , 'store'])->name('favorite.store');
    Route::post('/game/{id}/unfavorite' , [FavoriteGameController::class, 'destroy'])->name('game.unfavorite');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'Dashboard'])->name('dashboard.content');

    Route::get('/add-game', function () {
        return view('admin.game_add');
    });
    Route::post('/add-game', [GameController::class, 'store'])->name('add-game');
    Route::delete('/admin/{id}', [GameController::class, 'destroy'])->name('admin.games.destroy');
    Route::get('/edit-game/{id}', [GameController::class, 'editGame'])->name('edit-game');
    Route::delete('/edit-game/screenshot/{id}', [ScreenshotController::class, 'destroy'])->name('Screenshot.destroy');
    Route::put('/edit-game/{id}', [GameController::class, 'update'])->name('Game.update');
    Route::post('/admin/ban/{id}', [UserController::class, 'banUser'])->name('user.ban');
    Route::post('/admin/unban/{id}', [UserController::class, 'unbanUser'])->name('user.unban');
    Route::delete('/admin/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
    Route::get('/admin/search' , [DashboardController::class , 'search'])->name('game.search');
});
