<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\Interfaces\PostService;

class PostController extends Controller
{
    public function __construct(private PostService $postRepository) {}

    public function index()
    {
        return $this->postRepository->getAllPosts();
    }

    public function show($postId)
    {
        return $this->postRepository->getPostById($postId);
    }

    public function store(CreatePostRequest $request)
    {
        return $this->postRepository->createPost($request->validated());
    }

    public function update($postId, UpdatePostRequest $request)
    {
        return $this->postRepository->updatePost($postId, $request->validated());
    }

    public function destroy($postId)
    {
        return $this->postRepository->deletePost($postId);
    }
}
