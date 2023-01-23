<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'Basic',
                'slug' => 'basic'
            ],
            [
                'name' => 'Individual',
                'slug' => 'individual'
            ],
            [
                'name' => 'School or Non-Profit Making Organization',
                'slug' => 'school-npo'
            ],
            [
                'name' => 'Organization',
                'slug' => 'organization'
            ],
        ];

        foreach ($roles as $role) {
            \App\Models\Role::factory()->create([
                'name' => $role['name'],
                'slug' => $role['slug'],
            ]);
        }
    }
}
