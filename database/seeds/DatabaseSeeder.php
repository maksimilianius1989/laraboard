<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(AdvertCategoriesTableSeeder::class);
    }
}
