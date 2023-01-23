<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $participantCategories = [
            'Individual',
            'School',
            'Art Center',
            'Institution',
        ];

        foreach ($participantCategories as $participantCategory) {
            \App\Models\ParticipantCategory::create([
                'name' => $participantCategory,
            ]);
        }
    }
}
