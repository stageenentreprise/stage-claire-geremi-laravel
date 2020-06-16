<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create() {
        $title = "Create a course";
        return view('course/createCourse');
    }

    public function insert(CourseRequest $request) {
        return 'trgre';
    }
}
