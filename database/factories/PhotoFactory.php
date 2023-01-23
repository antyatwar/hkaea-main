<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Storage;
use Throwable;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
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
          //'image' => $this->createImage(),
          'published_at' => fake()->dateTimeBetween('-6 month', '+1 month'),
          'created_at' => fake()->dateTimeBetween('-1 year', '-6 month'),
          'updated_at' => fake()->dateTimeBetween('-5 month', 'now'),
        ];
    }

    public function createImage(): ?string
    {
        try {
            $image = file_get_contents('https://source.unsplash.com/random/600x400/?img=1');
        } catch (Throwable $exception) {
            return null;
        }

        $filename = Str::uuid() . '.jpg';

        Storage::disk('public')->put($filename, $image);

        return $filename;
    }
}
