<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Throwable;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competition>
 */
class CompetitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $title = [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'slug' => Str::slug($title['en']),
            'description' => [
                'en' => 'English: ' . fake()->paragraphs(3, true),
                'zh-hk' => '香港中文: ' . fake()->paragraphs(3, true),
            ],
            'process_title_1' => [
                'en' => 'Judges Meeting',
                'zh-hk' => '評審會議',
            ],
            'process_date_1' => fake()->date(),
            'process_image_1' => 'demo-post.jpg',
            'process_title_2' => [
                'en' => 'Results Announcement',
                'zh-hk' => '賽果公布',
            ],
            'process_date_2' => fake()->date(),
            'process_image_2' => 'demo-post.jpg',
            'process_title_3' => [
                'en' => 'Exhibition of Outstanding Artworks',
                'zh-hk' => '優秀作品展覽',
            ],
            'process_date_3' => fake()->date(),
            'process_image_3' => 'demo-post.jpg',
            'process_title_4' => [
                'en' => 'Awards Presentation Ceremony',
                'zh-hk' => '優秀作品頒獎禮',
            ],
            'process_date_4' => fake()->date(),
            'process_image_4' => 'demo-post.jpg',

            'painting_format' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'poster' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'age_groups' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'judging_criteria' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'prizes' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'payment_method' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'individual_application' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'group_application' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'other_details' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'terms' => [
                'en' => 'English: ' . fake()->unique()->sentence(4),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(4),
            ],
            'ceremony_image' => 'demo-post.jpg',
            'ceremony_content' => [
                'en' => 'English: ' . fake()->unique()->sentence(200),
                'zh-hk' => '香港中文: ' . fake('zh-hk')->unique()->sentence(200),
            ],
            'highlights' => [[
                'youtube_link' => 'https://www.youtube.com/embed/52QjwUfRwG4',
            ]],
            'artworks' => [[
                'artwork_image' => 'demo-post.jpg',
            ]],
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
