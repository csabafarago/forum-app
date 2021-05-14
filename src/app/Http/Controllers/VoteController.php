<?php

namespace App\Http\Controllers;

use App\Models\ThreadPost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index(ThreadPost $threadPost){
        $check = auth()->user()->votes()->toggle($threadPost);

        return response()->json([
            'result' => true,
            'post_id' => $threadPost->id,
            'user_id' => Auth::user()->id,
        ]);
    }
}
