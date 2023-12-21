<?php

namespace Database\Seeders;

use App\Models\ContactMedia;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ContactMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ContactMedia::truncate();
        Schema::enableForeignKeyConstraints();

        $contact_media = [
            [
                'custom_id' => get_unique_string(),
                'name'  =>  'Website',
                'icon'  =>  'fab fa-link',
                'is_active' =>  'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'custom_id' => get_unique_string(),
                'name'  =>  'Email',
                'icon'  =>  'fab fa-envelope',
                'is_active' =>  'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'custom_id' => get_unique_string(),
                'name'  =>  'Mobile',
                'icon'  =>  'fas fa-mobile',
                'is_active' =>  'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'custom_id' => get_unique_string(),
                'name'  =>  'Twitter',
                'icon'  =>  'fas fa-twitter',
                'is_active' =>  'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'custom_id' => get_unique_string(),
                'name'  =>  'Instagram',
                'icon'  =>  'fas fa-instagram',
                'is_active' =>  'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'custom_id' => get_unique_string(),
                'name'  =>  'Onlyfans',
                'icon'  =>  'fas fa-lock',
                'is_active' =>  'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'custom_id' => get_unique_string(),
                'name'  =>  'Linktree',
                'icon'  =>  'fas fa-lock',
                'is_active' =>  'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        ContactMedia::insert($contact_media);
    }
}
