<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomCategory;

class RoomCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Single', 'base_price' => 100.00, 'capacity' => 1],
            ['name' => 'Double', 'base_price' => 150.00, 'capacity' => 2],
            ['name' => 'Deluxe', 'base_price' => 250.00, 'capacity' => 2],
            ['name' => 'Suite', 'base_price' => 400.00, 'capacity' => 4],
            ['name' => 'Family', 'base_price' => 350.00, 'capacity' => 5],
        ];

        foreach ($categories as $category) {
            RoomCategory::firstOrCreate(['name' => $category['name']], $category);
        }
    }
}