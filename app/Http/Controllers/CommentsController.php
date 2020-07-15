<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function create($course_id) {
        try {
            $course_id = Course::findOrFail($course_id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        
        return view("comments.comment");
    }
}
