<?php

namespace Tests\Feature;

use App\Models\Comment;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CommentSeeder;
use Illuminate\Support\Facades\Auth;

class CommentTest extends TestCase
{
    public function testCreateCommentSuccess()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();

        $token = Auth::login($user);

        $post = Post::first();

        $comment = $this->withHeader('Authorization', 'Bearer' . $token)
            ->post('/api/comments', [
                'content' => 'joss',
                'post_id' => $post->id
            ])
            ->assertStatus(201);

        self::assertNotNull($comment->json('data'));
        self::assertNotNull($comment->json('data.0.content'));
        self::assertNotNull($comment->json('data.0.post_id'));
    }

    public function testCreateCommentRequired()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();

        $token = Auth::login($user);

        $post = Post::first();

        $comment = $this->withHeader('Authorization', 'Bearer' . $token)
            ->post('/api/comments', [
                'content' => '',
                'post_id' => $post->id
            ])
            ->assertJson(['errors' => [
                'content' => ['The content field is required.']
            ]])
            ->assertStatus(400);
    }

    public function testCreateCommentUnauthorized()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);
        $post = Post::first();

        $this->post('/api/comments', [
            'content' => '',
            'post_id' => $post->id
        ])
            ->assertJson(['error' => 'Token not provided'])
            ->assertStatus(401);
    }

    public function testUpdateCommentSuccess()
    {
        $this->seed([UserSeeder::class, PostSeeder::class, CommentSeeder::class]);

        $comment = Comment::first();

        $user = User::first();

        $token = Auth::login($user);

        $this->withHeader('Authorization', 'Bearer' . $token)
            ->patch('/api/comments/' . $comment->id, [
                'content' => 'updated',
            ])
            ->assertStatus(200);

        $updateComment = Comment::first();

        self::assertNotEquals($comment, $updateComment);
    }

    public function testUpdateCommentNotFound()
    {
        $this->seed([UserSeeder::class, PostSeeder::class, CommentSeeder::class]);

        $comment = Comment::first();

        $user = User::first();

        $token = Auth::login($user);

        $this->withHeader('Authorization', 'Bearer' . $token)
            ->patch('/api/comments/salah', [
                'content' => 'updated',
            ])
            ->assertStatus(404);
    }

    public function testUpdateCommentRequired()
    {
        $this->seed([UserSeeder::class, PostSeeder::class, CommentSeeder::class]);

        $comment = Comment::first();

        $user = User::first();

        $token = Auth::login($user);

        $this->withHeader('Authorization', 'Bearer' . $token)
            ->patch('/api/comments/' . $comment->id, [
                'content' => '',
            ])
            ->assertJson(['errors' => [
                'content' => ['The content field is required.']
            ]])
            ->assertStatus(400);
    }

    public function testUpdateCommentUnauthorized()
    {
        $this->seed([UserSeeder::class, PostSeeder::class, CommentSeeder::class]);

        $comment = Comment::first();

        $this
            ->patch('/api/comments/' . $comment->id, [
                'content' => '',
            ])
            ->assertJson(['error' => 'Token not provided'])
            ->assertStatus(401);
    }

    public function testDeleteCommentSuccess()
    {
        $this->seed([UserSeeder::class, PostSeeder::class, CommentSeeder::class]);

        $comment = Comment::first();

        $user = User::first();

        $token = Auth::login($user);

        $this
            ->withHeader('Authorization', 'Bearer' . $token)
            ->delete('/api/comments/' . $comment->id)
            ->assertStatus(200);
    }

    public function testDeleteCommentNotFound()
    {
        $this->seed([UserSeeder::class, PostSeeder::class, CommentSeeder::class]);

        $comment = Comment::first();

        $user = User::first();

        $token = Auth::login($user);

        $this
            ->withHeader('Authorization', 'Bearer' . $token)
            ->delete('/api/comments/salah')
            ->assertJson(['error' => 'comment not found'])
            ->assertStatus(404);
    }
}
