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
    public function insert(PartRequest $request) {
        $data = $request->all();
        //$data['slug']=Str::slug($data['name'],'-');
        Part::create($data);
        return 'parts';
    }
}
