<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



<<<<<<< HEAD
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Route::prefix('user')
    ->namespace('user')
    ->middleware('auth')
    ->name("user.")
    ->group(function () {
        Route::resource("/structures", "StructureController");
    });
>>>>>>> d68e8e9ffd0996e5d6af0a64c3d607fd99e409a2
