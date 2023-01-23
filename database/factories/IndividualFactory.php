<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Individual>
 */
class IndividualFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name_en' => fake()->firstName(),
            'last_name_en' => fake()->lastName(),
            'first_name_cn' => fake('zh_TW')->firstName(),
            'last_name_cn' => fake('zh_TW')->lastName(),
            'gender_id' => \App\Models\Gender::all()->random()->id,
            'birth_date' => fake()->dateTimeBetween('-18 years', '-3 years'),
            'occupation' => fake()->jobTitle(),
            'address' => fake()->address(),
            'country_id' => \App\Models\Country::all()->random()->id,
            'phone' => fake()->numberBetween(20000000, 99999999),
            'fax' => fake()->numberBetween(20000000, 99999999),
            'documents' => ['documents/dummy.jpg', 'documents/dummy.pdf'],
            'qualification_id' => \App\Models\Qualification::all()->random()->id,
            'qualification_other' => fake()->sentence(),
            'newsletter_other' => fake()->word(),
            'is_volunteer' => fake()->boolean(),
            'survey_id' => \App\Models\Survey::all()->random()->id,
            'survey_other' => fake()->sentence(),
            'comment' => fake()->text(),
            'paid_at' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
