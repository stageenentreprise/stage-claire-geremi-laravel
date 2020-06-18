<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartRequest;
use App\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartController extends Controller
{
    public function create() {
        $title = "Création d'une partie";
        return view('parts.create')
        ->withTitle($title);
    }
    public function insert(PartRequest $request) {
        $data = $request->all();
        Part::create($data);
        return 'parts';
    }
}
