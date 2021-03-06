
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/structures', 'Api\StructuresController@index');
Route::get('/structures/services', 'Api\StructuresController@services');
Route::get('/structures/search', 'Api\StructuresController@search')->name("api.structures.search");
Route::get('/structures/filter', 'Api\StructuresController@filter');
Route::get('/structures/sponsoredstructure', 'Api\StructuresController@SponsoredStructure');
