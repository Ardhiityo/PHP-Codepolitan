<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $user = User::first();
        $comment = Comment::first();
        $like = Like::first();

        Post::create([
            'content' => $faker->text(),
            'image' => $faker->imageUrl(640, 480, 'people'),
            'user_id' => $user->id,
            // 'comment_id' => $comment->id,
            // 'like_id' => $like->id
        ]);
    }
}
