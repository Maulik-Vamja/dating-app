<?php

namespace Database\Seeders;

use App\Models\PolicyType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PolicyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        PolicyType::truncate();
        Schema::enableForeignKeyConstraints();

        $policy_types = [
            [
                'custom_id'     => get_unique_string(),
                'type'          => 'Deposits',
                'is_active'     => 'y',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'custom_id'     => get_unique_string(),
                'type'          => 'Cancellations',
                'is_active'     => 'y',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ];

        PolicyType::insert($policy_types);
    }
}
