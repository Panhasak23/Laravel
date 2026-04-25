<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'phone' => '1234567890',
                'course' => 'Computer Science',
                'year' => 3,
                'gpa' => 3.75,
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
                'phone' => '2345678901',
                'course' => 'Software Engineering',
                'year' => 2,
                'gpa' => 3.90,
            ],
            [
                'name' => 'Michael Brown',
                'email' => 'michael.brown@example.com',
                'phone' => '3456789012',
                'course' => 'Information Technology',
                'year' => 4,
                'gpa' => 3.45,
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'phone' => '4567890123',
                'course' => 'Computer Science',
                'year' => 1,
                'gpa' => 3.60,
            ],
            [
                'name' => 'David Wilson',
                'email' => 'david.wilson@example.com',
                'phone' => '5678901234',
                'course' => 'Data Science',
                'year' => 3,
                'gpa' => 3.85,
            ],
            [
                'name' => 'Jessica Martinez',
                'email' => 'jessica.martinez@example.com',
                'phone' => '6789012345',
                'course' => 'Software Engineering',
                'year' => 2,
                'gpa' => 4.00,
            ],
            [
                'name' => 'Christopher Lee',
                'email' => 'christopher.lee@example.com',
                'phone' => '7890123456',
                'course' => 'Cybersecurity',
                'year' => 4,
                'gpa' => 3.55,
            ],
            [
                'name' => 'Amanda Taylor',
                'email' => 'amanda.taylor@example.com',
                'phone' => '8901234567',
                'course' => 'Computer Science',
                'year' => 1,
                'gpa' => 3.70,
            ],
            [
                'name' => 'Daniel Anderson',
                'email' => 'daniel.anderson@example.com',
                'phone' => '9012345678',
                'course' => 'Information Technology',
                'year' => 3,
                'gpa' => 3.30,
            ],
            [
                'name' => 'Michelle Thomas',
                'email' => 'michelle.thomas@example.com',
                'phone' => '0123456789',
                'course' => 'Data Science',
                'year' => 2,
                'gpa' => 3.95,
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}

