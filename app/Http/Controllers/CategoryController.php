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

    public function edit($id)
    {
        $category= Category::findOrFail($id);
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        return view("categories.category-edit")->withCategories($categories)->withCategory($category);
    }

    public function update($id,CategoryRequest $request){

        try {
            $category = Category::findOrFail($id);
            $category->name = $request->input('name');
            $category->category_id = $request->input('category_id');
            $category->save();
            return 'OKaYYY';
        } 
        catch (\Exception $e) {
            echo $e->getMessage();
            return "ko";
        }
        return redirect('/');
    }
}