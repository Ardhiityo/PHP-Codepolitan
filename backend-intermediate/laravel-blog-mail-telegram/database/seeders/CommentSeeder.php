<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $post = Post::firstOrFail();

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->comment = "Kereeen";
        $comment->save();
    }
}
