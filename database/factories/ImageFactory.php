<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date=fake()->date('Y-m-d h:m:s');
        return [
            // 'path'=>fake()->imageUrl(),//بحط post_id هناك عند سيدر البوست علشان يربط ك1ا صورة بالبوست
            'path' => 'https://picsum.photos/seed/' . fake()->unique()->word . '/640/480',
            'created_at'=>$date,
            'updated_at'=>$date,
        ];
    }
}
