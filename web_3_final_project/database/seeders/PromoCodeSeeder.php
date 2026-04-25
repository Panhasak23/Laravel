<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PromoCode;
use Carbon\Carbon;

class PromoCodeSeeder extends Seeder
{
    public function run()
    {
        $promoCodes = [
            ['code' => 'EARLY20', 'discount' => 20.00, 'active' => true, 'expires' => Carbon::now()->addYear()],
            ['code' => 'WEEKEND15', 'discount' => 15.00, 'active' => true, 'expires' => Carbon::now()->addYear()],
            ['code' => 'FAMILY25', 'discount' => 25.00, 'active' => true, 'expires' => Carbon::now()->addYear()],
            ['code' => 'SUMMER30', 'discount' => 30.00, 'active' => true, 'expires' => Carbon::now()->addYear()],
            ['code' => 'LOYALTY10', 'discount' => 10.00, 'active' => true, 'expires' => Carbon::now()->addYear()],
            ['code' => 'FLASH35', 'discount' => 35.00, 'active' => true, 'expires' => Carbon::now()->addMonths(3)],
            ['code' => 'EXPIRED50', 'discount' => 50.00, 'active' => false, 'expires' => Carbon::now()->subMonths(1)],
        ];

        foreach ($promoCodes as $promo) {
            PromoCode::firstOrCreate(
                ['code' => $promo['code']],
                [
                    'code' => $promo['code'],
                    'discount_percent' => $promo['discount'],
                    'is_active' => $promo['active'],
                    'expires_at' => $promo['expires'],
                ]
            );
        }
    }
}