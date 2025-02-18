<?php

namespace App\Services\Interfaces;

use App\Models\Like;
use App\Models\Post;

interface LikeService
{
    public function createLike($postId);
    public function deleteLike($likeId);
}
