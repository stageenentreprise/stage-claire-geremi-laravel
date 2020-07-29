<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->middleware('auth',['except' => ['checkLogin']]);
        $this->middleware('admin');
        $this->middleware('categories.share');
    }

    public function index() {
        return view("dashboard");
    }
}
