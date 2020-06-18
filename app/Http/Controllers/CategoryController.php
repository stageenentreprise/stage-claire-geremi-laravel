<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        return view("categories.create")->withCategories($categories);
    }
    public function insert(CategoryRequest $request)
    {   
       // dd($request->all());
       $data=$request->all();
       $data['slug']=Str::slug($data['name'],'-');
       $category=Category::create($data);
        return redirect(url('category/create'));
    }
}
