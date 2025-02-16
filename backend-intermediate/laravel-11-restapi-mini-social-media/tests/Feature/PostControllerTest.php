<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Auth;

class PostControllerTest extends TestCase
{
    public function testGetAllPostsSuccess()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();

        $token = Auth::login($user);

        $data = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->get('/api/posts')
            ->assertStatus(200);

        self::assertNotNull($data->json('data'));
    }

    public function testGetAllPostsUnauthorized()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $data = $this
            ->get('/api/posts')
            ->assertJson(['error' => 'Token not provided'])
            ->assertStatus(401);
    }

    public function testCreatePostSuccess()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();

        $token = Auth::login($user);

        $this->withHeader('Authorization', 'Bearer' . $token)
            ->post('/api/posts', [
                'content' => 'Hellow world'
            ])->assertStatus(201);
    }

    public function testCreatePostRequired()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();

        $token = Auth::login($user);

        $this->withHeader('Authorization', 'Bearer' . $token)
            ->post('/api/posts', [
                'content' => ''
            ])
            ->assertJson(['errors' => [
                'content' => ['The content field is required.']
            ]])
            ->assertStatus(400);
    }

    public function testCreatePostUnauthorized()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $this
            ->post('/api/posts', [
                'content' => ''
            ])
            ->assertJson(
                ['error' => 'Token not provided']
            )
            ->assertStatus(401);
    }

    public function testUpdateSuccess()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();
        $post = Post::first();

        $token = Auth::login($user);

        $this->withHeader('Authorization', 'Bearer' . $token)
            ->patch("/api/posts/$post->id", [
                'content' => 'updated'
            ])
            ->assertStatus(200);

        $newContent = Post::first();

        self::assertNotEquals($post->content, $newContent->content);
    }

    public function testUpdateRequired()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();
        $post = Post::first();

        $token = Auth::login($user);

        $this->withHeader('Authorization', 'Bearer' . $token)
            ->patch("/api/posts/$post->id", [
                'content' => ''
            ])
            ->assertJson([
                'errors' => [
                    'content' => ['The content field is required.']
                ]
            ])
            ->assertStatus(400);
    }

    public function testUpdateUnauthorized()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $post = Post::first();

        $this
            ->patch("/api/posts/$post->id", [
                'content' => ''
            ])
            ->assertJson([
                'error' => 'Token not provided'
            ])
            ->assertStatus(401);
    }

    public function testUpdateNotFound()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();
        $token = Auth::login($user);

        $this
            ->withHeader('Authorization', 'Bearer' . $token)
            ->patch("/api/posts/salah", [
                'content' => 'update'
            ])
            ->assertJson([
                'error' => 'post not found'
            ])
            ->assertStatus(404);
    }

    public function testDeleteSuccess()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $post = Post::first();
        $comment = Comment::first();
        $like = Like::first();

        $user = User::first();
        $token = Auth::login($user);

        $this
            ->withHeader('Authorization', 'Bearer' . $token)
            ->delete("/api/posts/$post->id")
            ->assertStatus(200);

        $findPost = Post::find($post->id);
        self::assertNull($findPost);
        self::assertNull($comment);
        self::assertNull($like);
    }

    public function testDeleteUnauthorized()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $post = Post::first();

        $this
            ->delete("/api/posts/$post->id")
            ->assertJson(['error' => 'Token not provided'])
            ->assertStatus(401);
    }

    public function testDeleteNotFound()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $post = User::first();

        $user = User::first();
        $token = Auth::login($user);

        $this
            ->withHeader('Authorization', 'Bearer' . $token)
            ->delete("/api/posts/salah")
            ->assertJson(['error' => 'post not found'])
            ->assertStatus(404);
    }

    public function testFindById()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();

        $token = Auth::login($user);

        $post = Post::first();

        $this->withHeader('Authorization', 'Bearer' . $token)
            ->get("/api/posts/$post->id")
            ->assertJson(['data' => [
                'user_id' => $user->id,
                'content' => $post->content
            ]])
            ->assertStatus(200);
    }
}
