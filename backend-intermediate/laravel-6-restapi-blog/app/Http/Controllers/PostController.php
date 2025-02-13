<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\PostCollection;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function post()
    {
        $post = Post::paginate(10);
        return new PostCollection($post);
    }

    public function show(int $id)
    {
        $post = Post::find($id);
        if ($post) {
            return new PostResource($post);
        }
        return response()->json([
            "message" => "resource not found"
        ], 404);
    }

    public function store(StoreRequest $request)
    {
        $post = $request->user()->posts()->create($request->all());
        return response()->json($post, 201);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        if ($post) {
            $post->fill($request->all());
            $post->save();
        }
        return response()->json([
            "message" => "resource not found"
        ], 404);
    }

    public function delete($id, Request $request)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return response()->json(true);
        }
        return response()->json([
            "message" => "resource not found"
        ], 404);
    }
}
