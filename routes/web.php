<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddGradeController;
use App\Http\Controllers\EditGradeController;
use App\Http\Controllers\ViewGradeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewGradeHistoryController;
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
 Route::group(['middleware' => ['can:isAdmin,isTeacher']], function () {
    Route::get('add_grades',[App\Http\Controllers\AddGradeController::class, 'index']);
    Route::view('add_grade','add_grades');
    Route::post('add_grade',[App\Http\Controllers\AddGradeController::class, 'addGrade']);
 });


 Route::group(['middleware' => ['can:isTeacher']], function () {
    Route::get('add_grades',[App\Http\Controllers\AddGradeController::class, 'index']);
    Route::view('add_grade','add_grades');
    Route::post('add_grade',[App\Http\Controllers\AddGradeController::class, 'addGrade']);
 });

//viewgrades
Route::get('view_grades',[App\Http\Controllers\ViewGradesController::class, 'joinTables']);

Route::view('view','view_grades')->middleware('can:isAdmin, isTeacher, isStudent');
Route::post('view',[App\Http\Controllers\AddGradesController::class, 'viewGrade']);
Route::get('view',[App\Http\Controllers\AddGradesController::class, 'joinTables']);

Route::get('edit/{id}',[App\Http\Controllers\ViewGradesController::class, 'editGrade'])->middleware(['can:isAdmin, isTeacher']);
Route::post('edit',[App\Http\Controllers\ViewGradesController::class, 'update']);
//grade history
Route::get('grade_history',[App\Http\Controllers\ViewGradeHistoryController::class, 'joinHistory']);

//add user
Route::view('add_user','add_user')->middleware('can:isAdmin');
Route::post('add_user',[App\Http\Controllers\AddUserController::class, 'addUser'])->middleware('can:isAdmin');

Route::resource('users', UserController::class);

Route::view('user_list','user_list')->middleware('can:isAdmin, isTeacher');
Route::get('user_list',[App\Http\Controllers\UserController::class, 'index'])->middleware('can:isAdmin, isTeacher');

Route::view('create_user','create_user')->middleware('can:isAdmin');
Route::get('create_user',[App\Http\Controllers\UserController::class, 'create'])->middleware('can:isAdmin');




