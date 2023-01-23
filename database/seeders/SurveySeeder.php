<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surveys = [
            'Friends / Colleagues / Family',
            'HKAEA Websites / Facebook / Instagram',
            'Newsletter / Publication',
            'Referrer',
            'School',
            'Search Engines',
            'Other (Please Specify)',
        ];

        foreach ($surveys as $survey) {
            \App\Models\Survey::create([
                'name' => $survey,
            ]);
        }
    }
}
