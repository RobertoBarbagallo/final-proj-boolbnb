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
>>>>>>> 000d70ea38d9ca4c6a8c02fe1e0c7568903cb868
