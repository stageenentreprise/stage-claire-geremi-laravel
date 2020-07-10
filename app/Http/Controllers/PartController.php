<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Requests\PartRequest;
use App\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PartController extends Controller
{
    public function create($course_id) {
        try {
            $course_id = Course::findOrFail($course_id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        $categories = Category::whereNull("category_id")->get();
        return view("parts.create")
        ->withCourseid($course_id)
        ->withCategories($categories)
        ;
    }

    public function edit($id) {
        try {
            $part = Part::findOrFail($id);
        } catch (\Exception $e) {
            return "Erreur";
        }

        return view("parts.edit")
        ->withPart($part)
        ;
    }

    public function insert($course_id, PartRequest $request) {
        try {
            $course_id = Course::findOrFail($course_id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['course_id'] = $course_id->id;
        // $data['numero'] = intval($data['numero']);
        // var_dump($data);
        Part::create($data);
        return redirect('/course/view/'.$course_id->id);
    }
}
