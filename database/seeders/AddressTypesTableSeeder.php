<?php

namespace Database\Seeders;

use App\Models\AddressType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AddressTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        AddressType::truncate();
        Schema::enableForeignKeyConstraints();

        $types = [
            [
                'custom_id' => get_unique_string(),
                'address_type' => 'Locations',
                'is_active' => 'y'
            ],
            [
                'custom_id' => get_unique_string(),
                'address_type' => 'Based In',
                'is_active' => 'y'
            ]
        ];

        AddressType::insert($types);
    }
}
