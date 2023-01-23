<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'org_name_en' => fake()->company(),
            'org_name_cn' => fake('zh_TW')->company(),
            'address' => fake()->address(),
            'country_id' => \App\Models\Country::all()->random()->id,
            'org_pic_name_en' => fake()->name(),
            'org_pic_name_cn' => fake('zh_TW')->name(),
            'org_pic_title' => fake()->jobTitle(),
            'org_pic_email' => fake()->email(),
            'org_pic_phone' => fake()->numberBetween(20000000, 99999999),
            'org_pic_whatsapp' => fake()->numberBetween(20000000, 99999999),
            'is_org_cp_same_as_org_pic' => fake()->boolean(),
            'org_cp_name_en' => fake()->name(),
            'org_cp_name_cn' => fake('zh_TW')->name(),
            'org_cp_title' => fake()->jobTitle(),
            'org_cp_email' => fake()->email(),
            'org_cp_phone' => fake()->numberBetween(20000000, 99999999),
            'org_cp_whatsapp' => fake()->numberBetween(20000000, 99999999),
            'organization_category_id' => \App\Models\OrganizationCategory::all()->random()->id,
            'organization_category_other' => fake()->sentence(),
            'document_type' => Arr::random(['bsrc', 'npod', 'other']),
            'documents' => ['documents/dummy.jpg', 'documents/dummy.pdf'],
            'bsrn' => fake()->numberBetween(00000000, 99999999),
            'fax' => fake()->numberBetween(20000000, 99999999),
            'newsletter_other' => fake()->word(),
            'is_volunteer' => fake()->boolean(),
            'survey_id' => \App\Models\Survey::all()->random()->id,
            'survey_other' => fake()->sentence(),
            'comment' => fake()->text(),
            'paid_at' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
