<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use CreateCategoriesTable;
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
    public function categories()
    {
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        return view("categories.categories")->withCategories($categories);
    }

    public function edit()
    {
        try {
            $categories = Category::all();
        } catch (\Exception $e) {
            return "Erreur";
        }

        return view('categories.category-edit')->withCategories($categories);
    }
}