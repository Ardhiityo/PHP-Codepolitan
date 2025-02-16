<?php

namespace App\Services\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\PostService;
use Exception;

class PostRepository implements PostService
{
    public function getAllPosts()
    {
        return Post::paginate(perPage: 10);
    }

    public function createPost($post)
    {
        $post = Post::create($post);
        return response()->json(['data' => $post], 201);
    }

    public function getPostById($postId)
    {
        try {
            $post = Post::findOrFail($postId);
            return response()->json(['data' => $post], 200);
        } catch (Exception $exception) {
            return response(['error' => 'post not found'], 404);
        }
    }

    public function deletePost($postId)
    {
        try {
            $post = Post::findOrFail($postId);
            $user = Auth::user();
            $post->like()->where('user_id', $user->id)->delete();
            return $post->delete();
        } catch (Exception $exception) {
            return response(['error' => 'post not found'], 404);
        }
    }

    public function updatePost($postId, $post)
    {
        try {
            return Post::findOrFail($postId)->update($post);
        } catch (Exception $exception) {
            return response(['error' => 'post not found'], 404);
        }
    }
}
