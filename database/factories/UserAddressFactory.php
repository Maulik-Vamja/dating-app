<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
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
            'address_type_id'   =>  \App\Models\AddressType::inRandomOrder()->first()->id,
            'country_id'    =>  \App\Models\Country::inRandomOrder()->first()->id,
            'state_id'  =>  \App\Models\State::inRandomOrder()->first()->id,
            'city_id'   =>  \App\Models\City::inRandomOrder()->first()->id,
            'is_primary'    =>  'y',
        ];
    }
}
