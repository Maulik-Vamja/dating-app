<?php

namespace Database\Seeders;

use App\Models\RateType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RateTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        RateType::truncate();
        Schema::enableForeignKeyConstraints();

        $rate_types = [
            [
                'custom_id'     => get_unique_string(),
                'type'          => 'Incall',
                'is_active'     => 'y',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'custom_id'     => get_unique_string(),
                'type'          => 'Outcall',
                'is_active'     => 'y',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'custom_id'     => get_unique_string(),
                'type'          => 'Touring',
                'is_active'     => 'y',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'custom_id'     => get_unique_string(),
                'type'          => 'Online',
                'is_active'     => 'y',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ];

        RateType::insert($rate_types);
    }
}
