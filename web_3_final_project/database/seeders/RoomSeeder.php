<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Enums\RoomStatusEnum;

class RoomSeeder extends Seeder
{
    public function run()
    {
        // First, ensure categories exist and get their IDs
        $categoryIds = [];
        
        $categories = [
            'Single' => ['base_price' => 100.00, 'capacity' => 1],
            'Double' => ['base_price' => 150.00, 'capacity' => 2],
            'Deluxe' => ['base_price' => 250.00, 'capacity' => 2],
            'Suite' => ['base_price' => 400.00, 'capacity' => 4],
            'Family' => ['base_price' => 350.00, 'capacity' => 5],
        ];

        foreach ($categories as $name => $data) {
            $category = RoomCategory::firstOrCreate(
                ['name' => $name],
                ['base_price' => $data['base_price'], 'capacity' => $data['capacity']]
            );
            $categoryIds[$name] = $category->id;
        }

        // Create rooms with proper syntax
        $roomsToCreate = [];

        // Singles: 101-110 (10 rooms)
        for ($i = 101; $i <= 110; $i++) {
            $status = match($i) {
                102 => RoomStatusEnum::OCCUPIED->value,
                107 => RoomStatusEnum::DIRTY->value,
                default => RoomStatusEnum::AVAILABLE->value,
            };
            $roomsToCreate[] = [
                'room_number' => (string)$i,
                'category_id' => $categoryIds['Single'],
                'status' => $status,
            ];
        }

        // Doubles: 201-215 (15 rooms)
        for ($i = 201; $i <= 215; $i++) {
            $status = match($i) {
                202, 205 => RoomStatusEnum::OCCUPIED->value,
                210 => RoomStatusEnum::DIRTY->value,
                default => RoomStatusEnum::AVAILABLE->value,
            };
            $roomsToCreate[] = [
                'room_number' => (string)$i,
                'category_id' => $categoryIds['Double'],
                'status' => $status,
            ];
        }

        // Deluxe: 301-310 (10 rooms)
        for ($i = 301; $i <= 310; $i++) {
            $status = match($i) {
                304 => RoomStatusEnum::OCCUPIED->value,
                308 => RoomStatusEnum::DIRTY->value,
                default => RoomStatusEnum::AVAILABLE->value,
            };
            $roomsToCreate[] = [
                'room_number' => (string)$i,
                'category_id' => $categoryIds['Deluxe'],
                'status' => $status,
            ];
        }

        // Suites: 401-405 (5 rooms)
        for ($i = 401; $i <= 405; $i++) {
            $status = match($i) {
                402 => RoomStatusEnum::OCCUPIED->value,
                default => RoomStatusEnum::AVAILABLE->value,
            };
            $roomsToCreate[] = [
                'room_number' => (string)$i,
                'category_id' => $categoryIds['Suite'],
                'status' => $status,
            ];
        }

        // Family: 501-510 (10 rooms)
        for ($i = 501; $i <= 510; $i++) {
            $status = match($i) {
                503, 506 => RoomStatusEnum::OCCUPIED->value,
                509 => RoomStatusEnum::DIRTY->value,
                default => RoomStatusEnum::AVAILABLE->value,
            };
            $roomsToCreate[] = [
                'room_number' => (string)$i,
                'category_id' => $categoryIds['Family'],
                'status' => $status,
            ];
        }

        // Insert all rooms at once
        foreach ($roomsToCreate as $roomData) {
            Room::firstOrCreate(
                ['room_number' => $roomData['room_number']],
                $roomData
            );
        }
    }
}