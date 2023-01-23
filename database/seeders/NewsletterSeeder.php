<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsletters = [
            'Advertising',
            'Creative Art / Art Therapy',
            'Dance',
            'Drama',
            'Drawing / Painting',
            'Education',
            'Fashion Design',
            'Film',
            'Graphic Design',
            'Handicraft / Art Craft',
            'Image and Styling',
            'Installation',
            'Literature',
            'Multimedia',
            'Music',
            'Photography',
            'Sculpture',
            'Other (Please Specify)',
        ];

        foreach ($newsletters as $newsletter) {
            \App\Models\Newsletter::create([
                'name' => $newsletter,
            ]);
        }
    }
}
