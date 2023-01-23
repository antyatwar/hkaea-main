<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ageGroups = [
            [
                'name' => '3',
                'min_age' => 3,
                'max_age' => 3,
            ],
            [
                'name' => '4',
                'min_age' => 4,
                'max_age' => 4,
            ],
            [
                'name' => '5',
                'min_age' => 5,
                'max_age' => 5,
            ],
            [
                'name' => '6',
                'min_age' => 6,
                'max_age' => 6,
            ],
            [
                'name' => '7-8',
                'min_age' => 7,
                'max_age' => 8,
            ],
            [
                'name' => '9-10',
                'min_age' => 9,
                'max_age' => 10,
            ],
            [
                'name' => '11-12',
                'min_age' => 11,
                'max_age' => 12,
            ],
            [
                'name' => '13-15',
                'min_age' => 13,
                'max_age' => 15,
            ],
            [
                'name' => '16-18',
                'min_age' => 16,
                'max_age' => 18,
            ],
        ];

        foreach ($ageGroups as $ageGroup) {
            \App\Models\AgeGroup::create($ageGroup);
        }
    }
}
