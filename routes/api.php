<?php

use App\Models\Item;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'AuthenticationController@login');
Route::get('/user', 'AuthenticationController@getLoggedInUser');
Route::get('/units', 'UnitsController@index');
Route::get('/item-categories', 'ItemCategoriesController@index');
Route::get('/items', 'ItemsController@index');
Route::get('/tables', 'TablesController@index');

Route::post('pos-orders/{posOrder}/items-remove', 'PosOrdersController@remove');
Route::resource('pos-orders', 'PosOrdersController');
