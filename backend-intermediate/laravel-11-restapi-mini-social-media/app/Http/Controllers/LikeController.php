<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct(private LikeService $likeRepository) {}

    public function store($postId)
    {
        return $this->likeRepository->createLike($postId);
    }

    public function destroy($likeId)
    {
        return $this->likeRepository->deleteLike($likeId);
    }
}
