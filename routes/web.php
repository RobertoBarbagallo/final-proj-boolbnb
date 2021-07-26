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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(array('GET', 'POST'), '/', 'HomeController@index')->name('home.index');
Route::post("/search", 'HomeController@search')->name('home.search');
Route::get('/guestsearch', 'HomeController@show')->name('home.show');

Auth::routes();

Route::prefix('user')
    ->namespace('user')
    ->middleware('auth')
    ->name("user.")
    ->group(function () {
        Route::resource("/structures", "StructureController");
    });

// Route::get('api/structure', 'Api\StructureController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
