<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/category/create', 'CategoryController@create')->name('create_category');
Route::post('/category/insert', 'CategoryController@insert')->name('insert_category');

Route::get('/categories', 'CategoryController@categories')->name('view_categories');

Route::get('/category/edit/{id}', 'CategoryController@edit')->name('edit_category');
Route::post('/category/update/{id}', 'CategoryController@update');

Route::get('/course/create', 'CourseController@create')->name('create_course');
Route::post('/course/insert', 'CourseController@insert')->name('insert_course');
Route::get('/course/edit/{id}', 'CourseController@edit')->name('course_edit');

Route::get('/courses', 'CourseController@courses')->name('view_courses');

Route::get('/part/{course}/create', 'PartController@create')->name('create_part');
Route::post('/part/{course}/insert', 'PartController@insert')->name('insert_part');
