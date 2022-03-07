<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('login', 'Auth\AuthController@index')->name('login');
Route::post('post-login', 'Auth\AuthController@postLogin')->name('login.post'); 
Route::get('registration', 'Auth\AuthController@registration')->name('register');
Route::post('post-registration', 'Auth\AuthController@postRegistration')->name('register.post'); 
Route::get('dashboard', 'Auth\AuthController@dashboard'); 
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

Route::get('forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

Route::get('students', 'StudentController@index')->name('students');
Route::post('/create', 'StudentController@create')->name('students.store');;
Route::get('/studentEdit/{id}', 'StudentController@edit')->name('students.edit');
Route::post('/studentEdit/{id}','StudentController@update')->name('students.post-edit');
Route::delete('/student/{id}', 'StudentController@delete');

Route::get('export-csv', 'StudentController@export');
Route::post('import-csv', 'StudentController@import');
Route::get('import-export-csv', 'StudentController@importExportCsv');
