<?php

namespace App\Services\Interfaces;

interface CommentService
{
    public function createComment($comment);
    public function updateComment($commentId, $comment);
    public function deleteComment($commentId);
}
