<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin users
        $admins = [
            ['name' => 'Sarah Admin', 'email' => 'sarah.admin@azureluxe.com'],
            ['name' => 'John Admin', 'email' => 'john.admin@azureluxe.com'],
        ];

        foreach ($admins as $admin) {
            User::firstOrCreate(
                ['email' => $admin['email']],
                [
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'password' => Hash::make('password123'),
                    'role' => UserRoleEnum::ADMIN,
                ]
            );
        }

        // Staff users
        $staff = [
            ['name' => 'Mike Staff', 'email' => 'mike.staff@azureluxe.com'],
            ['name' => 'Emma Staff', 'email' => 'emma.staff@azureluxe.com'],
            ['name' => 'David Staff', 'email' => 'david.staff@azureluxe.com'],
        ];

        foreach ($staff as $member) {
            User::firstOrCreate(
                ['email' => $member['email']],
                [
                    'name' => $member['name'],
                    'email' => $member['email'],
                    'password' => Hash::make('password123'),
                    'role' => UserRoleEnum::STAFF,
                ]
            );
        }

        // Customer users
        $customers = [
            ['name' => 'Alice Johnson', 'email' => 'alice.johnson@email.com'],
            ['name' => 'Bob Smith', 'email' => 'bob.smith@email.com'],
            ['name' => 'Carol White', 'email' => 'carol.white@email.com'],
            ['name' => 'Diana Brown', 'email' => 'diana.brown@email.com'],
            ['name' => 'Ethan Davis', 'email' => 'ethan.davis@email.com'],
            ['name' => 'Fiona Miller', 'email' => 'fiona.miller@email.com'],
            ['name' => 'Grace Lee', 'email' => 'grace.lee@email.com'],
            ['name' => 'Henry Wilson', 'email' => 'henry.wilson@email.com'],
            ['name' => 'Ivy Martinez', 'email' => 'ivy.martinez@email.com'],
            ['name' => 'Jack Taylor', 'email' => 'jack.taylor@email.com'],
        ];

        foreach ($customers as $customer) {
            User::firstOrCreate(
                ['email' => $customer['email']],
                [
                    'name' => $customer['name'],
                    'email' => $customer['email'],
                    'password' => Hash::make('password123'),
                    'role' => UserRoleEnum::CUSTOMER,
                ]
            );
        }
    }
}