<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        Auth::login($user);
        return redirect()->route('profile');
    }
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->role === 'admin'){
                return redirect()->route('dashboard.content');
            }
            return redirect()->route('profile');
        } else {
            return back()->withErrors(['email' => 'invalid credentials']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
