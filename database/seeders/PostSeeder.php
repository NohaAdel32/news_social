<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $post= Post::factory()->count(50)->create();
        $post->each(function($post){  //هنا عاوز يجيب لكل بوست صورتين
           Image::factory(2)->create([
            'post_id'=>$post->id,
           ]);
        });
    }
}
