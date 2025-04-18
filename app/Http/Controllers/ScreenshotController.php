<?php

namespace App\Http\Controllers;
use App\Models\GameScreenshot;

use Illuminate\Http\Request;

class ScreenshotController extends Controller
{
    public function destroy($id){
        $screenshot = GameScreenshot::find($id);
        $screenshot->delete();
        return redirect()->back();
    }
}
