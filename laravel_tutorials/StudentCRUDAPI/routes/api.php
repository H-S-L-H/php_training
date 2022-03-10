<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('students','Api\StudentController@getStudents');
Route::get('student/{id}','Api\StudentController@getStudentById');
Route::post('student','Api\StudentController@createStudent');
Route::put('student/edit/{id}','Api\StudentController@updateStudent');
Route::delete('student/delete/{id}','Api\StudentController@deleteStudent');