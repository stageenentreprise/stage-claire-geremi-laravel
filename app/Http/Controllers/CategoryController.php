<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Requests\CategoryRequest;
use CreateCategoriesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->middleware('auth',['except' => ['checkLogin']]);
        $this->middleware('admin',['except' => ['frontView', 'frontViewList']]);
        $this->middleware('categories.share');
    }

    public function create()
    {
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        return view("categories.create")->withCategories($categories);
    }
    public function insert(CategoryRequest $request)
    {   
       // dd($request->all());
       $data=$request->all(); 
       $suffixe = "";
       if ($request->hasFile('photo')) {
        $data['photo'] = true;
        }
       $data['user_id'] = Auth::user()->id;
        do{
            $data['slug']=Str::slug($data['name'],'-') . ($suffixe == '' ? "" : "-") . $suffixe; 
            $exist = Category::where('slug', $data['slug'])->first();
            if($exist != null) {
                if ($suffixe == "") {
                    $suffixe = 2;
                } else {
                    $suffixe++;
                }
            }
        } while($exist != null); 
        
        $category=Category::create($data);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $name = $category->slug.".png";
            $destinationPath = storage_path('/images/categories');
            $photo->move($destinationPath, $name);
        }
       
        return redirect(url('category/create'));
    }

    public function image($id) {
        try {
            $category = Category::findOrFail($id);
            
        } catch (\Exception $e) {
            return 'Catégorie non trouvée';
        }

        if ($category->photo) {
            $destinationPath = storage_path('/images/categories');
            $file = $destinationPath . '/' . $category->slug . '.png';
            return response()->download($file);
        }else {
            return 'Cette vidéo n\'existe pas';
        }
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

    public function frontView($slug) {
        $categories = Category::orderBy('name')->get();
        $actualCategory = Category::where('slug', $slug)->get();
        foreach ($actualCategory as $key) {
            $courses = Course::where('category_id', '=', $key->id)->get();
        }
        // $actualCategory = Category::where('slug', $slug)->first();
        // $categoryArray = array();
        // $currentCategoryUpdate = $actualCategory->replicate();
        // while ($currentCategoryUpdate != null) {
        //     $currentCategoryUpdate = $currentCategoryUpdate->parent;
        //     $currentCategoryUpdate->save();
        //     array_push($categoryArray, $currentCategoryUpdate);
        // }
        $currentCategory2 = Category::where('slug',$slug)->first();
        $separateur = "├─";
        return view("user.categories")
        ->withCategories($categories)
        ->withActualCategory($actualCategory)
        ->withCurrentCategory2($currentCategory2)
        ->withSeparateur($separateur)
        ->withCourses($courses)
        // ->withCategoryArray($categoryArray)
        ;
    }
    public function frontViewList() {
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        $separateur = "├─";
        return view("user.categories-list")
        ->withCategories($categories)
        ->withSeparateur($separateur)
        ;
    }

}