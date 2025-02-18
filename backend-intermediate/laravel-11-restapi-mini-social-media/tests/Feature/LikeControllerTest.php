<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Auth;

class LikeControllerTest extends TestCase
{
    public function testLikeSuccess()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();

        $token = Auth::login($user);

        $post = Post::first();

        $this->withHeader('Authorization', 'Bearer' . $token)
            ->post('/api/likes/' . $post->id)->assertStatus(200);
    }

    public function testLikeUnauthorized()
    {
        $this->seed([UserSeeder::class, PostSeeder::class]);

        $user = User::first();

        $token = Auth::login($user);

        $post = Post::first();

        $this
            ->post('/api/likes/' . $post->id)
            ->assertJson(['error' => 'Token not provided'])
            ->assertStatus(status: 401);
    }
}
