<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Requests\CourseRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function create() {
        $tier = 0;
        $separateur = "";
        $title = "Create a course";
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        return view('course/createCourse')
        ->withTitle($title)
        ->withCategories($categories)
        ->withTier($tier)
        ->withSeparateur($separateur)
        ;
    }

    public function insert(CourseRequest $request) {
        $data = $request->all();
        $data['created'] = Carbon::now();
        $data['updated'] = Carbon::now();
        // DB::table('courses')->insert(
        //     ['category_id' => 'john@example.com']
        // );
        $data['user_id'] = Auth::user()->id;
        $data['slug']=Str::slug($data['title'],'-');
        Course::create($data);
        return "Vous avez créé une formation ! <br> Nom : " . $data['title']
        ;
    }

    public function courses() {
        $courses = Course::orderBy('title')->get();
        return view("course.courses")->withCourses($courses);
    }
}
