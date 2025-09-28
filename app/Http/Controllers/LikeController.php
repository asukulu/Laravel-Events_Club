<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Event;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Event $event)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $like = $event->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            return response()->json(['liked' => false, 'count' => $event->likes()->count()]);
        } else {
            $event->likes()->create(['user_id' => $user->id]);
            return response()->json(['liked' => true, 'count' => $event->likes()->count()]);
        }
    }
}
