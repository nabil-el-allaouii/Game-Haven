<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\ForumThread;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'title'=>['string' , 'required'],
            'content'=>['string','required'],
            'category'=>['required','string'],
            'game'=>['integer','nullable'],
            'Type'=>['required','string'],
            'attachments'=>['array']
        ]);
        $MediaUrl = [];
        if($request->hasFile('attachments')){
            foreach($request->file('attachments') as $media){
                $mediaName = Str::uuid().'.'.$media->getClientOriginalExtension();
                $media->storeAs('ThreadMedia',$mediaName,'public');
                $path = '/ThreadMedia/'.$mediaName;
                $MediaUrl[]=$path;
            }
        }
        $thread = ForumThread::create([
            'title'=>$validated['title'],
            'content'=>$validated['content'],
            'category'=>$validated['category'],
            'game_id'=>$validated['game'],
            'type'=>$validated['Type'],
            'user_id'=>Auth::user()->id
        ]);
        if(!empty($MediaUrl)){
            $thread->update([
                'media'=>$MediaUrl[0]
            ]);
        }
        return redirect()->back()->with('success','Thread created Successfully');
    }
    public function viewAddThread(){
        $games = Game::all();
        return view('forum.add_thread',compact('games'));
    }
    public function viewContent(string $id){
        $thread = ForumThread::with('user','replies.user')->findOrFail($id);
        return view('forum.thread_content',compact('thread'));
    }
    public function destroy(string $id){
        $thread = ForumThread::findOrfail($id);
        $thread->delete();
        return redirect()->route('forum.show');
    }
}
