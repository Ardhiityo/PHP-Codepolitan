<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Services\Interfaces\CommentService;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService) {}

    public function store(CreateCommentRequest $request)
    {
        return $this->commentService->createComment(comment: $request->validated());
    }

    public function update($commentId, UpdateCommentRequest $request)
    {
        return $this->commentService->updateComment(commentId: $commentId, comment: $request->validated());
    }

    public function destroy($commentId)
    {
        return $this->commentService->deleteComment(commentId: $commentId);
    }
}
