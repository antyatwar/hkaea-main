<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizationCategories = [
            'Kindergarten',
            'Primary School',
            'Secondary School',
            'Collage / University',
            'Special School',
            'NGO',
            'NPO',
            'Company',
            'Other (Please Specify)',
        ];

        foreach ($organizationCategories as $organizationCategory) {
            \App\Models\OrganizationCategory::create([
                'name' => $organizationCategory,
            ]);
        }
    }
}
