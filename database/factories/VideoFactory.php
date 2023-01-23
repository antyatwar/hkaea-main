<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Storage;
use Throwable;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'category_id' => fake()->numberBetween(2,6),
          'title' => $title = [
              'en' => 'English: ' . fake()->unique()->sentence(4),
              'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
          ],
          'published_at' => fake()->dateTimeBetween('-6 month', '+1 month'),
          'created_at' => fake()->dateTimeBetween('-1 year', '-6 month'),
          'updated_at' => fake()->dateTimeBetween('-5 month', 'now'),
        ];
    }


}
