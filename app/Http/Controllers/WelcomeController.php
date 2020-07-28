<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $html = Category::where('slug', 'htmlcss')->get();

        return view("accueil")
        ->withHtml($html)
        ;
    }
}
