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
|asasas
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('zip-codes/{zip_code}', 'TestController@index');
// Route::post('read_excel', 'TestController@readExcel');
Route::resource('federalEntity', 'FederalEntityController');
Route::resource('municipality', 'MunicipalityController');
Route::resource('zip-codes', 'ZipCodeController');
