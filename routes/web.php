<?php

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

Route::get('/index', 'HomeController@index')->name('index');
Route::resource('course', 'CourseController');
Route::get('/search-course', 'CourseController@getSearch')->name('course.search');
Route::get('/search-lesson/{id}', 'LessonController@getSearchLesson')->name('lesson.search');
Route::resource('lesson', 'LessonController');
Route::group(['middleware' => 'teacher'], function () {
    Route::get('admin', 'AdminController@index')->name('admin.index');
});
