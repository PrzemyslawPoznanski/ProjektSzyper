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



//file upload
Route::view('file', 'upload');
Route::post('FileController', [App\Http\Controllers\FileController::class, 'upload']);


//session
Route::view('session', 'session');
Route::post('session', [App\Http\Controllers\SessionController::class, 'index']);
Route::view('home_page_session', 'home_page_session');

//Crud
use App\Http\Controllers\UserController;
Route::resource('users', UserController::class);

