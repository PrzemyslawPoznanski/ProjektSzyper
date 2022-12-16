<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddGradeController;
use App\Http\Controllers\EditGradeController;
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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('welcome', 'DashboardController@index');

//logout
Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
Route::get('/logout', 'App\Http\Controllers\LogoutController@perform')->name('logout.perform');
 });
 //endlogout

 //addgrades
Route::get('add_grades',[App\Http\Controllers\AddGradeController::class, 'index']);
Route::view('add','add_grades');
Route::post('add',[App\Http\Controllers\AddGradeController::class, 'addGrade']);

//edit grades

//add user
Route::view('add_user','add_user');
Route::post('add_user',[App\Http\Controllers\AddUserController::class, 'addUser']);
