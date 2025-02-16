<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $post = Post::first();
        $faker = Factory::create();

        Comment::create(
            [
                'user_id' => $user->id,
                'content' => $faker->text(),
                'post_id' => $post->id
            ]
        );
    }
}
