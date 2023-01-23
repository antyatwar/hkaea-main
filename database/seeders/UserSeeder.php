<?php

namespace Database\Seeders;

use App\Models\Individual;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        \App\Models\User::factory()
            ->hasAttached(\App\Models\Role::first())
            ->hasAttached(\App\Models\Newsletter::all()->random(4))
            ->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);

        // Individual - basic
        \App\Models\User::factory()
            ->hasAttached(\App\Models\Role::where('slug', 'basic')->first())
            ->hasAttached(\App\Models\Newsletter::all()->random(4))
            ->has(\App\Models\Individual::factory()->hasParticipant(function (array $attributes, Individual $individual) {
                return [
                    'user_id' => $individual->user_id,
                ];
            }))
            ->create([
                'name' => 'Basic Member',
                'email' => 'basic@example.com',
                'password' => bcrypt('password'),
            ]);

        // Individual - individual
        \App\Models\User::factory()
            ->hasAttached(\App\Models\Role::where('slug', 'individual')->first())
            ->hasAttached(\App\Models\Newsletter::all()->random(4))
            ->has(\App\Models\Individual::factory()->hasParticipant(function (array $attributes, Individual $individual) {
                return [
                    'user_id' => $individual->user_id,
                ];
            }))
            ->create([
                'name' => 'Individual Member',
                'email' => 'individual@example.com',
                'password' => bcrypt('password'),
            ]);

        // Group - school-npo
        \App\Models\User::factory()
            ->hasAttached(\App\Models\Role::where('slug', 'school-npo')->first())
            ->hasAttached(\App\Models\Newsletter::all()->random(4))
            ->has(\App\Models\Organization::factory()->hasParticipants(4, function () {
                return [
                    'user_id' => \App\Models\User::factory(),
                ];
            }))
            ->create([
                'name' => 'School NPO Member',
                'email' => 'school-npo@example.com',
                'password' => bcrypt('password'),
            ]);

        // Group - organization
        \App\Models\User::factory()
            ->hasAttached(\App\Models\Role::where('slug', 'organization')->first())
            ->hasAttached(\App\Models\Newsletter::all()->random(4))
            ->has(\App\Models\Organization::factory()->hasParticipants(4, function () {
                return [
                    'user_id' => \App\Models\User::factory(),
                ];
            }))
            ->create([
                'name' => 'Organization Member',
                'email' => 'organization@example.com',
                'password' => bcrypt('password'),
            ]);
    }
}
