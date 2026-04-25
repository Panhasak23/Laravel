<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(): string
    {
        return 'This is Student Controller';
    }
}