<?php

namespace Database\Seeders;

use App\Models\AgeGroup;
use App\Models\NewsletterTopic;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AgeGroupSeeder::class,
            CountrySeeder::class,
            GenderSeeder::class,
            NewsletterSeeder::class,
            OrganizationCategorySeeder::class,
            ParticipantCategorySeeder::class,
            PaymentMethodSeeder::class,
            QualificationSeeder::class,
            SurveySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            CompetitionSeeder::class,
            ArtworkSeeder::class,
            PhotoSeeder::class,
            VideoSeeder::class,
        ]);
    }
}
