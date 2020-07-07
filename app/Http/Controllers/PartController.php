<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartRequest;
use App\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PartController extends Controller
{
    public function create() {
        $title = "Création d'une partie";
        return view('parts.create')
        ->withTitle($title);
    }
    public function insert(PartRequest $request) {
        $data = $request->all();
        //$data['slug']=Str::slug($data['name'],'-');
        Part::create($data);
        return 'parts';
    }
}
