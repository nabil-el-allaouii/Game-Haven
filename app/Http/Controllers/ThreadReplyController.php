<?php

namespace App\Http\Controllers;

use App\Models\ThreadReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadReplyController extends Controller
{
    public function store(Request $request,string $id){
        $validated = $request->validate([
            'reply'=>['required','string']
        ]);
        $reply = ThreadReply::create([
            'reply'=>$validated['reply'],
            'user_id'=>Auth::user()->id,
            'forum_thread_id'=>$id
        ]);
        return redirect()->back();
    }
    public function destroy(string $id){
        $reply = ThreadReply::findOrFail($id);
        $reply->delete();
        return redirect()->back();
    }
}
