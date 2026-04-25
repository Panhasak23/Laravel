<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = [
            ['id' => 1, 'name' => 'Alice Johnson', 'email' => 'alice@example.com', 'grade' => 'A'],
            ['id' => 2, 'name' => 'Bob Smith', 'email' => 'bob@example.com', 'grade' => 'B+'],
            ['id' => 3, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'grade' => 'A-'],
            ['id' => 4, 'name' => 'Diana Prince', 'email' => 'diana@example.com', 'grade' => 'A'],
            ['id' => 5, 'name' => 'Ethan Hunt', 'email' => 'ethan@example.com', 'grade' => 'B'],
        ];

        return view('students', compact('students'));
    }
}