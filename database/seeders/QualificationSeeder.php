<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualifications = [
            'Bachelor (EDU)',
            'Bachelor',
            'Doctorate Degree',
            'Master',
            'PGCE',
            'PGDE',
            'Primary',
            'Secondary',
            'Sub-Degree',
            'Other (Please Specify)',
        ];

        foreach ($qualifications as $qualification) {
            \App\Models\Qualification::create([
                'name' => $qualification,
            ]);
        }
    }
}
