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

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('welcome', 'DashboardController@index');

//file upload
Route::view('file', 'upload');
Route::post('FileController', [App\Http\Controllers\FileController::class, 'upload']);


//session
Route::view('session', 'session');
Route::post('session', [App\Http\Controllers\SessionController::class, 'index']);
Route::view('home_page_session', 'home_page_session');

