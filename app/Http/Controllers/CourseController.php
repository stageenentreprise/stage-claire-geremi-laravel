<?php

namespace App\Http\Controllers;

use App\Category;
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
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        return view('course/createCourse')
        ->withTitle($title)
        ->withCategories($categories);
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

    public function courses() {
        $courses = Course::orderBy('title')->get();
        return view("course.courses")->withCourses($courses);
    }
}
