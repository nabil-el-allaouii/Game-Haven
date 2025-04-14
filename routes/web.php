<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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