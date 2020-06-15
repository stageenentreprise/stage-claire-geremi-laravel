<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create() {
        $title = "Create a course";
        return view('course/createCourse');
    }
}
