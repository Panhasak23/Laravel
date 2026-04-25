<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoomCategorySeeder::class,
            RoomSeeder::class,
            UserSeeder::class,
            PromoCodeSeeder::class,
            BookingSeeder::class,
        ]);
    }
}