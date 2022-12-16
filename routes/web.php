<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddGradeController;
use App\Http\Controllers\EditGradeController;
use App\Http\Controllers\ViewGradeController;
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
Route::view('add_grade','add_grades')->middleware('can:isTeacher');
Route::post('add_grade',[App\Http\Controllers\AddGradeController::class, 'addGrade']); 

//viewgrades
Route::get('view_grades',[App\Http\Controllers\ViewGradesController::class, 'joinTables']);

Route::view('view','view_grades');
Route::post('view',[App\Http\Controllers\AddGradesController::class, 'viewGrade']);
Route::get('view',[App\Http\Controllers\AddGradesController::class, 'joinTables']);

//add user
Route::view('add_user','add_user')->middleware('can:isAdmin');
Route::post('add_user',[App\Http\Controllers\AddUserController::class, 'addUser']);
