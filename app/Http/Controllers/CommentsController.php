<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Course;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create($course_id) {
        try {
            $course = Course::findOrFail($course_id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        
        return view("comments.comment")->withCourse($course);
    }

    public function insert(CommentRequest $request, $course_id) {
        try {
            $course = Course::findOrFail($course_id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        $data=$request->all();
        $data['user_id'] = Auth::user()->id;
        $data['course_id'] = $course_id;
        $comment=Comment::create($data);
        
        return redirect(url('/course/view/' .$course_id))
        ;

    }
}
