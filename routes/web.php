  
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
Route::match(array('GET', 'POST'), '/details', 'HomeController@details')->name('home.details');
Route::post('/storemessage', 'HomeController@storemessage')->name('home.storemessage');

// Route::get('/payment/make', 'PaymentsController@make')->name('payment.make');

Route::get("user/structures/{id}/sponsorship", "User\StructureController@sponsorship")->name('user.structures.sponsorship')->middleware('auth');
Route::get("user/structures/{id}/structureSponsored", "User\StructureController@sponsorship")->name('user.structures.structureSponsored')->middleware('auth');

Route::post("user/structures/{id}/sponsorship/payment", "User\StructureController@payment")->name('user.structures.payment');
// Route::post("user/structures/{id}/sponsorship/payment2", "User\StructureController@paymentUpdate")->name('user.structures.paymentUpdate');


Auth::routes();


Route::prefix('user')
    ->namespace('user')
    ->middleware('auth')
    ->name("user.")
    ->group(function () {
        Route::resource("/structures", "StructureController");
    });



// Route::get('api/structure', 'Api\StructureController@index');
