<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function banUser(string $id){
        $user = User::findOrFail($id);
        $user->status = 'banned';
        $user->save();
        return redirect()->back();
    }
    public function unbanUser(string $id){
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();
        return redirect()->back();
    }
    public function deleteUser(string $id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
