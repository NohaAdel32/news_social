<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
   $this->call([//لازم اراعي ترتيب المعتمد ع بعضه في id زي جدول
        AdminSeeder::class,
        UserSeeder::class,
        CategorySeeder::class,
        PostSeeder::class,
        ContactSeeder::class,
        CommentSeeder::class,
        RelatedSitesSeeder::class,
   ]);
    }
}
