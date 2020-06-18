<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartController extends Controller
{
    public function create() {
        $title = "Création d'une partie";
        return view('course/createCourse')
        ->withTitle($title);
    }
}
