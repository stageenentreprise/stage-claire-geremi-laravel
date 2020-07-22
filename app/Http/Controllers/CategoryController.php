<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
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
        return view("categories.category-edit")
        ->withCategories($categories)
        ->withCategory($category);
    }

    public function update($id,CategoryRequest $request){

        try {
            $category = Category::findOrFail($id);
            $category->name = $request->input('name');
            $category->category_id = $request->input('category_id');
            $category->save();

            return redirect(url('/categories'));
        } 
        catch (\Exception $e) {
            echo $e->getMessage();
            return "ko";
        }
        return redirect('/');
    }

    public function delete($id){
        Category::destroy($id);
        return redirect(url('/categories'));
    }

    public function frontView($id) {
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        foreach ($categories as $category) {
        $courses = Course::where('category_id', '=', $category->id)->get();
        }
        // $owners = Owner::where('id', '>', 0)->orderBy('name', 'desc')->get(); 
        $currentCategory2 = Category::findOrFail($id);
        $separateur = "├─";
        return view("user.categories")
        ->withCategories($categories)
        ->withCurrentCategory2($currentCategory2)
        ->withSeparateur($separateur)
        ->withCourses($courses)
        ;
    }

}