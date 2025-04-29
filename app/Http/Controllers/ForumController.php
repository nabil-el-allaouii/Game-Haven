<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\ForumThread;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function ShowForum(){
        $threads = ForumThread::with('game','user')->paginate(5);
        $topContributors = User::withCount('threads')->orderByDesc('threads_count')->having('threads_count','!=',0)->limit(3)->get(); 
        $gamesWithThreads = Game::withCount('threads')->orderByDesc('threads_count')->having('threads_count','!=',0)->limit(4)->get();
        $DiscussionThreads = ForumThread::where('category','=','Game Discussion')->count();
        $generalThread = ForumThread::where('category','=','General Discussion')->count();
        $technicalThread = ForumThread::where('category','=','Technical Support')->count();
        $communityThread = ForumThread::where('category','=','Community Creations')->count();
        return view('forum.forum',compact('threads','topContributors','gamesWithThreads','DiscussionThreads','generalThread','technicalThread','communityThread'));
    }
}
