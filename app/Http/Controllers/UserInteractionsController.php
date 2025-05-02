<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInteractionsController extends Controller
{
    public function review(Request $request, $id)
    {
        $validated = $request->validate([
            'rating' => ['required', 'numeric'],
            'review' => ['required', 'string']
        ]);
        $game = Game::findOrFail($id);
        $user_id = $request->user()->id;
        $AlrReviewed = Rating::where('user_id' ,'=',$user_id)->where('game_id','=',$game->id)->first();
        if (!$AlrReviewed) {
            Rating::create([
                'rating' => $validated['rating'],
                'review' => $validated['review'],
                'game_id' => $game->id,
                'user_id' => Auth::user()->id
            ]);
        }else{
            return redirect()->back()->withErrors(['alr' => "You've already submitted a review"]);
        }
        return redirect()->back();
    }
    public function deleteReview(string $id){
        $review = Rating::findOrFail($id);
        $review->delete();
        return redirect()->back(); 
    }
}
