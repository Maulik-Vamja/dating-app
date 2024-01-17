<?php

namespace Database\Factories;

use App\Models\PolicyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPolicy>
 */
class UserPolicyFactory extends Factory
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
            'policy_type_id'    => 1,
            'description' => $this->faker->text(100),
        ];
    }
}
