<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes  ♪ une vie de route ♪
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/category/consultation/{slug}', 'CategoryController@frontView')->name('view_front_categories'); //catégories utilisateur
Route::get('/categories/liste', 'CategoryController@frontViewList')->name('view_front_list_categories');
Route::get('/formations', 'CourseController@frontView')->name('view_front_courses');
Route::get('/formation/{slug}/{chapterid}', 'CourseController@frontViewCourse')->name('view_front_course');
Route::get('/formationpreview/{slug}', 'CourseController@frontPreviewCourse')->name('preview_front_course');
Route::get('/images/categories/{id}', 'CategoryController@image')->name('image');

Route::get('/dashboard', 'DashboardController@index')->name('view_dashboard');

Route::get('/category/create', 'CategoryController@create')->name('create_category');
Route::post('/category/insert', 'CategoryController@insert')->name('insert_category');

Route::get('/categories', 'CategoryController@categories')->name('view_categories');

Route::get('/category/edit/{id}', 'CategoryController@edit')->name('edit_category');
Route::post('/category/update/{id}', 'CategoryController@update');

Route::delete('/category/delete/{id}', 'CategoryController@delete');

Route::get('/comment/{idcourse}/create', 'CommentsController@create');
Route::post('/comment/{idcourse}/insert', 'CommentsController@insert');

Route::get('/course/create', 'CourseController@create')->name('create_course');
Route::post('/course/insert', 'CourseController@insert')->name('insert_course');
Route::get('/course/view/{id}', 'CourseController@view')->name('course_view');
Route::get('/course/edit/{id}', 'CourseController@edit')->name('course_edit');
Route::get('/course/{id}/addpart', 'CourseController@addpart')->name('course_addpart');
Route::post('/course/update/{id}', 'CourseController@update')->name('course_update');

Route::get('/courses', 'CourseController@courses')->name('view_courses');

Route::get('/part/{idcourse}/create', 'PartController@create')->name('create_part');
Route::post('/part/{idcourse}/insert', 'PartController@insert')->name('insert_part');
Route::get('/part/{id}/addchapter', 'PartController@addchapter')->name('part_addchapter');
Route::get('/part/edit/{id}', 'PartController@edit')->name('part_edit');
Route::delete('/part/delete/{id}', 'PartController@delete')->name('delete_part');
Route::post('/part/update/{id}', 'PartController@update')->name('part_update');
Route::get('/part/view/{id}', 'PartController@view')->name('part_view');

Route::post('/chapter/{id}/insert', 'PartController@insertchapter')->name('chapter_insert');
Route::get('/chapter/video/{id}', 'PartController@video')->name('video');