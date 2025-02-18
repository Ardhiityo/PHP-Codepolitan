<?php

namespace App\Services\Repositories;

use Exception;
use App\Models\Comment;
use App\Services\Interfaces\CommentService;

class CommentRepository implements CommentService
{
    public function __construct() {}

    public function createComment($comment)
    {
        $comment = Comment::create($comment);
        return response()->json(['data' => [$comment]], 201);
    }

    public function updateComment($commentId, $comment)
    {
        try {
            return Comment::findOrFail($commentId)->update($comment);
        } catch (Exception $exception) {
            return response(['error' => 'comment not found'], 404);
        }
    }

    public function deleteComment($commentId)
    {
        try {
            return Comment::findOrFail($commentId)->delete();
        } catch (Exception $exception) {
            return response(['error' => 'comment not found'], 404);
        }
    }
}
