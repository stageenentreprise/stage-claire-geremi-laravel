<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CourseRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function create() {
        $title = "Create a course";
        return view('course/createCourse')
        ->withTitle($title);
    }

    public function insert(CourseRequest $request) {
        $data = $request->all();
        $data['created'] = Carbon::now();
        $data['updated'] = Carbon::now();
        $data['user_id'] = Auth::user()->id;
        $data['slug']=Str::slug($data['title'],'-');
        Course::create($data);
        return 'trgre';
    }
}
