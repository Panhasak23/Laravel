<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of all students.
     */
    public function index()
    {
        // Mock student data array
        $students = [
            [
                'id' => 1,
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'phone' => '(555) 123-4567',
                'course' => 'Computer Science',
                'year' => 'Junior',
                'gpa' => '3.8',
            ],
            [
                'id' => 2,
                'name' => 'Emily Johnson',
                'email' => 'emily.johnson@example.com',
                'phone' => '(555) 234-5678',
                'course' => 'Business Administration',
                'year' => 'Senior',
                'gpa' => '3.5',
            ],
            [
                'id' => 3,
                'name' => 'Michael Brown',
                'email' => 'michael.brown@example.com',
                'phone' => '(555) 345-6789',
                'course' => 'Electrical Engineering',
                'year' => 'Sophomore',
                'gpa' => '3.9',
            ],
            [
                'id' => 4,
                'name' => 'Sarah Davis',
                'email' => 'sarah.davis@example.com',
                'phone' => '(555) 456-7890',
                'course' => 'Psychology',
                'year' => 'Senior',
                'gpa' => '3.7',
            ],
            [
                'id' => 5,
                'name' => 'David Wilson',
                'email' => 'david.wilson@example.com',
                'phone' => '(555) 567-8901',
                'course' => 'Mechanical Engineering',
                'year' => 'Junior',
                'gpa' => '3.4',
            ],
            [
                'id' => 6,
                'name' => 'Jennifer Martinez',
                'email' => 'jennifer.martinez@example.com',
                'phone' => '(555) 678-9012',
                'course' => 'Biology',
                'year' => 'Freshman',
                'gpa' => '3.6',
            ],
            [
                'id' => 7,
                'name' => 'Robert Taylor',
                'email' => 'robert.taylor@example.com',
                'phone' => '(555) 789-0123',
                'course' => 'Mathematics',
                'year' => 'Senior',
                'gpa' => '4.0',
            ],
            [
                'id' => 8,
                'name' => 'Lisa Anderson',
                'email' => 'lisa.anderson@example.com',
                'phone' => '(555) 890-1234',
                'course' => 'English Literature',
                'year' => 'Junior',
                'gpa' => '3.3',
            ],
            [
                'id' => 9,
                'name' => 'James Thomas',
                'email' => 'james.thomas@example.com',
                'phone' => '(555) 901-2345',
                'course' => 'Physics',
                'year' => 'Sophomore',
                'gpa' => '3.85',
            ],
            [
                'id' => 10,
                'name' => 'Mary Jackson',
                'email' => 'mary.jackson@example.com',
                'phone' => '(555) 012-3456',
                'course' => 'Chemistry',
                'year' => 'Senior',
                'gpa' => '3.75',
            ],
        ];

        return view('students.index', compact('students'));
    }
}

