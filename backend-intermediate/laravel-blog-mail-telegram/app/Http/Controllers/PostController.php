<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::active()->get();
        return view("posts.index", [
            "posts" => $posts,
            "title" => "Welcome to blog"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', ["title" => "Create post"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        Mail::to(Auth::user()->email)
            ->send(new BlogPosted($post));

        $api_token = "7741006641:AAH3GSX2vihGc1ZuZPz-iYS8-lqGZU_vyjY";
        $telegram_method = "sendMessage";
        $message = "Ada blog baru loh dengan judul <b>{$post->title}</b>";

        $content = [
            "chat_id" => -4629917525,
            "text" => $message,
            "parse_mode" => "html"
        ];
        Http::post("https://api.telegram.org/bot{$api_token}/{$telegram_method}", $content);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find(id: $id);
        $comment = $post->comments()->limit(2)->get();
        return view("posts.show", [
            "post" => $post,
            "comments" => $comment,
            "title" => "$post->slug"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit', [
            "post" => $post,
            "title" => "$post->slug"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->fill($request->all());
        $post->slug = Str::slug($request->input('title'));
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return redirect('/posts');
    }
}
