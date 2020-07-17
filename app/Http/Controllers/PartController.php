<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chapter;
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

    public function update($id, PartRequest $request){

        try {
            $parts = Part::orderBy('numero')->get();
            $part = Part::findOrFail($id);
        } 
        catch (\Exception $e) {
            echo $e->getMessage();
            return "ko";
        }
        $part->title = $request->input('title');
        $part->numero = $request->input('numero');
        $part->description = $request->input('description');
        $part->save();
        return redirect('/courses');
        return view("parts.edit")
        ->withParts($parts)
        ;
    }

    public function delete($id){
        $part = Part::findOrFail($id);
        $course_id = $part->course_id;
        $part->delete();
        return redirect(url('/course/view/'.$course_id));
    }

    public function addchapter($id) {
        try {
            $id = Part::findOrFail($id);
        } catch (\Exception $e) {
            return "Partie introuvable";
        }
        return view('chapters.create')
        ->withId($id)
        ;
    }

    public function insertchapter($part_id, PartRequest $request) {
        try {
            $part_id = Part::findOrFail($part_id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['part_id'] = $part_id->id;
        $video = $request->file('video');
        $name = $part_id->id.".mp4";
        $destinationPath = storage_path('/videos');
        $video->move($destinationPath, $name);
        Chapter::create($data);
        return redirect('/course/view/'.$course_id->id);
    }
}
