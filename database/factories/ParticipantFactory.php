<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'chinese_name' => fake('zh_TW')->name(),
            'english_name' => fake()->name(),
            'birth_date' => fake()->dateTimeBetween('-18 years', '-3 years'),
            'gender_id' => \App\Models\Gender::all()->random()->id,
            'parent_phone' => fake()->numberBetween(20000000, 99999999),
            'parent_email' => fake()->safeEmail(),
            // 'age_group_id' => \App\Models\AgeGroup::all()->random()->id,
            // 'participant_category_id' => \App\Models\ParticipantCategory::all()->random()->id,
            // 'country_id' => \App\Models\Country::all()->random()->id,
            // 'address' => fake()->address(),
            // 'instructor_name' => fake()->name(),
            // 'cheque_no' => fake()->numberBetween(100000, 999999),
            // 'paid_at' => fake()->dateTimeBetween('-10 years', 'now'),
            // 'is_paid' => fake()->boolean(),
            // 'receipt_no' => fake()->numberBetween(100000, 999999),
            // 'is_receipt_sent' => fake()->boolean(),
            // 'receipt_sent_by' => fake()->name(),
            // 'artwork_count' => fake()->numberBetween(1, 100),
            // 'artwork_title' => fake()->sentence(),
            // 'artwork_description' => fake()->paragraph(),
            // 'artwork_received_at' => fake()->dateTimeBetween('-10 years', 'now'),
            // 'mark' => fake()->numberBetween(1, 100),
            // 'prize_details' => fake()->sentence(),
            // 'prize_shown' => fake()->sentence(),
            // 'artwork_selected' => fake()->sentence(),
            // 'attendant_count' => fake()->numberBetween(1, 10),
            // 'is_cert_sent' => fake()->boolean(),
            // 'is_in_advance_award' => fake()->boolean(),
            // 'is_attend_ceremony' => fake()->boolean(),
            // 'attendant_count' => fake()->numberBetween(1, 10),
            // 'attendant_name' => fake()->name(),
            // 'attendant_relation' => fake()->word(),
            // 'attendant_phone' => fake()->numberBetween(20000000, 99999999),
            // 'remark' => fake()->paragraph(),
        ];
    }
}
