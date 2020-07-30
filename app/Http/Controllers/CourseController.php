<?php

namespace App\Http\Controllers;

use App\Category;
use App\Chapter;
use App\Comment;
use App\Course;
use App\Http\Requests\CourseRequest;
use App\Part;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Else_;
use PhpParser\Node\Stmt\TryCatch;

class CourseController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->middleware('auth',['except' => ['checkLogin']]);
        $this->middleware('admin',['except' => ['frontView', 'frontViewCourse']]);
        $this->middleware('categories.share');
    }

    public function create() {
        $tier = 0; //idée : afficher le tier d'une catégorie
        $separateur = "";
        $title = "Create a course";
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        return view('course/createCourse')
        ->withTitle($title)
        ->withCategories($categories)
        ->withTier($tier)
        ->withSeparateur($separateur)
        ;
    }

    public function insert(CourseRequest $request) {
        $data = $request->all();
        $data['created'] = Carbon::now();
        $data['updated'] = Carbon::now();
        $data['user_id'] = Auth::user()->id;
        $suffixe = "";
        $data['slug'] = preg_replace("/[+]/", "plus", $data['title']);
        do{
            $data['slug']=Str::slug($data['title'],'-') . ($suffixe == '' ? "" : "-") . $suffixe;
            $exist = Course::where('slug', $data['slug'])->first();
            if($exist != null) {
                if ($suffixe == "") {
                    $suffixe = 2;
                } else {
                    $suffixe++;
                }
            }
        } while($exist != null); 
        Course::create($data);
        return "Vous avez créé une formation ! <br> Nom : " . $data['title']
        ;
    }

    public function view($id) {
        try {
            $course = Course::findOrFail($id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        $categories = Category::whereNull("category_id")->get();
        return view("course.view")
        ->withCourse($course)
        ->withCategories($categories)
        ;
    }

    public function edit($id) {
        try {
            $course = Course::findOrFail($id);
        } catch (\Exception $e) {
            return "Erreur";
        }
        $categories = Category::whereNull("category_id")->get();

        return view("course.edit")
        ->withCourse($course)
        ->withCategories($categories)
        ;
    }

    public function update($id,CourseRequest $request){

        try {
            $courses = Course::orderBy('title')->get();
            $categories = Category::whereNull("category_id")->get();
            $course = Course::findOrFail($id);
        } 
        catch (\Exception $e) {
            echo $e->getMessage();
            return "ko";
        }
        $course->title = $request->input('title');
        $course->category_id = $request->input('category_id');
        $course->description = $request->input('description');
        $course->save();
        return redirect('/course/view/'.$id);
        return view("course.view")
        ->withCourses($courses)
        ->withCategories($categories)
        ;
    }

    public function courses() {
        $courses = Course::orderBy('title')->get();
        $categories = Category::whereNull("category_id")->orderBy('name')->get();
        return view("course.courses")
        ->withCourses($courses)
        ->withCategories($categories);
    }

    public function frontView() {
        $courses = Course::all();
        $chapters = Chapter::all();
        // $firstPart = Course::all()->firstPart();
        return view("user.courses")
        ->withCourses($courses)
        ->withChapters($chapters)
        // ->withFirstPart($firstPart)
        ;
    }

    public function frontViewCourse($slug, $chapterid) {
        try {
            // $course = Course::findOrFail($id);
            // $course = Course::where('slug', $slug)->first();
            $chapter = Chapter::findOrFail($chapterid);
        } catch (\Exception $e) {
            return "Formation introuvable";
        }
        return view("user.view-front")
        ->withCourse($chapter->part->course)
        ->withChapter($chapter)
        // ->withCourse($course)
        // ->withPartNumero($partnumero)
        // ->withChapterNumero($chapternumero)
        ;
    }

    public function frontPreviewCourse($slug) {
        $course = Course::where("slug",$slug)->first();
        if ($course == null) {
            return "Aucune formation correspond à ce nom";
        }
        return view("course.preview")
        ->withCourse($course)
        ;
            

    }
    
}
