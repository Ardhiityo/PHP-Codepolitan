<?php

namespace App\Services\Interfaces;

interface PostService
{
    public function getAllPosts();
    public function createPost($post);
    public function getPostById($postId);
    public function deletePost($postId);
    public function updatePost($postId, $post);
}
