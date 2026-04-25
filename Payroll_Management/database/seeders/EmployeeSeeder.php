<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Payroll;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample employees
        $emp1 = Employee::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'position' => 'Developer'
        ]);

        $emp2 = Employee::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'position' => 'Manager'
        ]);

        $emp3 = Employee::create([
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'position' => 'Designer'
        ]);

        // Create sample payrolls
        Payroll::create([
            'employee_id' => $emp1->id,
            'period' => '2024-10',
            'amount' => 5000.00,
            'status' => 'paid'
        ]);

        Payroll::create([
            'employee_id' => $emp2->id,
            'period' => '2024-10',
            'amount' => 7000.00,
            'status' => 'pending'
        ]);

        Payroll::create([
            'employee_id' => $emp3->id,
            'period' => '2024-10',
            'amount' => 4500.00,
            'status' => 'cancelled'
        ]);
    }
}

