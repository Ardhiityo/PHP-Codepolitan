<?php

namespace App\Services\Repositories;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\LikeService;
use Exception;

class LikeRepository implements LikeService
{
    public function createLike($postId)
    {
        try {
            $post = Post::find($postId);
            $like = Like::create([
                'user_id' => Auth::user()->id,
                'post_id' => $post->id
            ]);
            return response()->json(['data' => $like]);
        } catch (Exception $exception) {
            return response()->json(['error' => 'post id not found'], 404);
        }
    }

    public function deleteLike($likeId)
    {
        try {
            return Like::findOrFail($likeId)->delete();
        } catch (Exception $exception) {
            return response()->json(['error' => 'like id not found'], 404);
        }
    }
}
