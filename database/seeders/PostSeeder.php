<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts=Post::factory(100)->create();

        foreach($posts as $post){
            $tags=rand(1,5);
            $tagsIds=Tag::all()->random($tags)->pluck('id');
            $post->tags()->attach($tagsIds);
            $post->comments()->create([
                'text' =>'comentario',
                'user_id' => User::all()->random()->id,
            ]);
        }
    }
}
