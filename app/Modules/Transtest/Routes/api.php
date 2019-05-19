<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/transtest', function (Request $request) {
//     // return $request->transtest();
// })->middleware('auth:api');

Route::get('transtest', 'TransactiontestController@index');
Route::post('/transtest', 'TransactiontestController@store');

Route::get('transtest/{id}', 'TransactiontestController@show');
Route::put('transtest/{id}', 'TransactiontestController@update');
Route::delete('transtest/{id}', 'TransactiontestController@destroy');