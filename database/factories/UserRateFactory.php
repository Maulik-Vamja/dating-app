<?php

namespace Database\Factories;

use App\Models\RateType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'custom_id' =>  get_unique_string(),
            'rate_type_id' => RateType::inRandomOrder()->first()->id,
            'rate'  => $this->faker->numberBetween(100, 10000),
            'duration'  => $this->faker->numberBetween(1, 24) . ' hours',
            'description' => $this->faker->text(100),
        ];
    }
}
