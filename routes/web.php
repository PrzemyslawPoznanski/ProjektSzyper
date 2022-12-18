<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddGradeController;
use App\Http\Controllers\EditGradeController;
use App\Http\Controllers\ViewGradeController;
use App\Http\Controllers\UserController;
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

Route::view('add_user','add_user')->middleware('can:isAdmin');
Route::post('add_user',[App\Http\Controllers\AddUserController::class, 'addUser'])->middleware('can:isAdmin');

Route::resource('users', UserController::class)->middleware('can:isAdmin');

Route::view('user_list','user_list')->middleware('can:isAdmin');
Route::get('user_list',[App\Http\Controllers\UserController::class, 'index'])->middleware('can:isAdmin');

Route::view('create_user','create_user')->middleware('can:isAdmin');
Route::get('create_user',[App\Http\Controllers\UserController::class, 'create'])->middleware('can:isAdmin');

Route::view('view','view_grades')->middleware(['can:isUser']);
Route::get('view_grades',[App\Http\Controllers\ViewGradesController::class, 'joinTables'])->middleware(['can:isUser']);
Route::post('view',[App\Http\Controllers\AddGradesController::class, 'viewGrade'])->middleware(['can:isUser']);
Route::get('view',[App\Http\Controllers\AddGradesController::class, 'joinTables'])->middleware(['can:isUser']);

Route::view('add_grade','add_grades')->middleware(['can:isNotStudent']);
Route::get('add_grades',[App\Http\Controllers\AddGradeController::class, 'index'])->middleware(['can:isNotStudent']);
Route::post('add_grade',[App\Http\Controllers\AddGradeController::class, 'addGrade'])->middleware(['can:isNotStudent']);

Route::get('edit/{id}',[App\Http\Controllers\ViewGradesController::class, 'editGrade'])->middleware(['can:isNotStudent']);
Route::post('edit',[App\Http\Controllers\ViewGradesController::class, 'update'])->middleware(['can:isNotStudent']);

Route::get('grade_history',[App\Http\Controllers\ViewGradeHistoryController::class, 'joinHistory'])->middleware(['can:isUser']);






