<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth'); NE JAMAIS METTRE LE MIDDLEWARE AUTH ICI
        $this->middleware('categories.share');
    }

    public function index() {
        $html = Category::where('slug', 'htmlcss')->get();

        return view("accueil")
        ->withHtml($html)
        ;
    }
}
