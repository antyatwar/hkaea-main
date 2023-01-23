<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            'Male',
            'Female',
        ];

        foreach ($genders as $gender) {
            \App\Models\Gender::create([
                'name' => $gender,
            ]);
        }
    }
}
