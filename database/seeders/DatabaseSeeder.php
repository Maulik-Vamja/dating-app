<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Common Seeders
        $this->call([
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            // Commented this seeders as taking too much time and not able to execute seeding further
            // CitiesTableSeeder1::class, // Execute it separately: php artisan db:seed --class=CitiesTableSeeder1
            // CitiesTableSeeder2::class, // Execute it separately: php artisan db:seed --class=CitiesTableSeeder2
            // CitiesTableSeeder3::class, // Execute it separately: php artisan db:seed --class=CitiesTableSeeder3
            CurrenciesTableSeeder::class,
            TimezonesTableSeeder::class,
            LanguagesTableSeeder::class,
            AppSettingSeeder::class
        ]);

        // Admin Dependent Seeders
        $this->call([
            AdminsTableSeeder::class,
            SectionsTableSeeder::class,
            RolesTableSeeder::class,
            SettingsTableSeeder::class,
            CmsPagesTableSeeder::class,
        ]);
    }
}
