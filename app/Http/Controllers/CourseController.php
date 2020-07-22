<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chapter;
use App\Comment;
use App\Course;
use App\Http\Requests\CourseRequest;
use App\Part;
use App\User;
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
        $data['user_id'] = Auth::user()->id;
        $data['slug']=Str::slug($data['title'],'-');
        Course::create($data);
        return "Vous avez créé une formation ! <br> Nom : " . $data['title']
        ;
    }

    public function view($id) {
        try {
            $course = Course::findOrFail($id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        $categories = Category::whereNull("category_id")->get();
        $parts = Part::orderBy('numero')->get();
        $chapters = Chapter::orderBy('numero')->get();
        $comments = Comment::orderBy('updated_at', 'desc')->get();
        $users = User::orderBy('name')->get();
        return view("course.view")
        ->withCourse($course)
        ->withCategories($categories)
        ->withParts($parts)
        ->withChapters($chapters)
        ->withComments($comments)
        ->withUsers($users)
        ;
    }

    public function edit($id) {
        try {
            $course = Course::findOrFail($id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        $categories = Category::whereNull("category_id")->get();

        return view("course.edit")
        ->withCourse($course)
        ->withCategories($categories)
        ;
    }

    public function update($id,CourseRequest $request){

        try {
            $courses = Course::orderBy('title')->get();
            $categories = Category::whereNull("category_id")->get();
            $course = Course::findOrFail($id);
        } 
        catch (\Exception $e) {
            echo $e->getMessage();
            return "ko";
        }
        $course->title = $request->input('title');
        $course->category_id = $request->input('category_id');
        $course->description = $request->input('description');
        $course->save();
        return redirect('/course/view/'.$id);
        return view("course.view")
        ->withCourses($courses)
        ->withCategories($categories)
        ;
    }

    public function courses() {
        $courses = Course::orderBy('title')->get();
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        return view("course.courses")
        ->withCourses($courses)
        ->withCategories($categories);
    }

    public function frontView($id) {
        $currentCategory2 = Category::findOrFail($id);
        return view("user.courses")
        ->withCurrentCategory2($currentCategory2)
        ;
    }

    
}
