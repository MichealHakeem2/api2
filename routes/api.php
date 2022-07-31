<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TrackesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public route
//student
Route::get('student/index', "StudentController@index");
Route::get('student/show/{id}', "StudentController@show");
//admin
Route::get('admin/index', "AdminController@index");
Route::get('admin/show/{id}', "AdminController@show");
//trackes
Route::get('trackes/index', "TrackesController@index");
Route::get('trackes/show/{id}', "TrackesController@show");
//levels
Route::get('levels/index', "LevelsController@index");
Route::get('levels/show/{id}', "LevelsController@show");
//courses
Route::get('courses/index', "CoursesController@index");
Route::get('courses/show/{id}', "CoursesController@show");
//rating
Route::get('rating/index', "RatingController@index");
Route::get('rating/show/{id}', "RatingController@show");
Route::post('register',"AuthController@register");
Route::post('login/admin',"AdminController@loginAdmin");
Route::post('login',"AuthController@login");

//Private route
Route::group(['middleware'=>["auth:sanctum"]],function(){
//student
Route::post('student/store',"StudentController@store");
Route::put('student/update/{id}',"StudentController@update");
Route::delete('student/delete/{id}',"StudentController@destroy");
//admin
Route::post('admin//store',"AdminController@store");
Route::put('admin//update/{id}',"AdminController@update");
Route::delete('admin//delete/{id}',"AdminController@destroy");
//trackes
Route::post('trackes/store',"TrackesController@store");
Route::put('trackes/update/{id}',"TrackesController@update");
Route::delete('trackes/delete/{id}',"TrackesController@destroy");
//levels
Route::post('levels/store',"LevelsController@store");
Route::put('levels/update/{id}',"LevelsController@update");
Route::delete('levels/delete/{id}',"LevelsController@destroy");
//courses
Route::post('courses/store',"CoursesController@store");
Route::put('courses/update/{id}',"CoursesController@update");
Route::delete('courses/delete/{id}',"CoursesController@destroy");
//rating
Route::post('rating/store',"RatingController@store");
Route::put('rating/update/{id}',"RatingController@update");
Route::delete('rating/delete/{id}',"RatingController@destroy");
    Route::post('logout',"AuthController@logout");
});
