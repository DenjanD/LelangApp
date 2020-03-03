<?php

use Illuminate\Http\Request;

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

//Level APIs
Route::get('level', 'LevelController@read');
Route::post('level', 'LevelController@add');

//Petugas APIs
Route::get('petugas', 'PetugasController@read');
Route::post('petugas', 'PetugasController@add');

//Masyarakat APIs
Route::get('masyarakat', 'MasyarakatController@read');
Route::post('masyarakat', 'MasyarakatController@add');

//Barang APIs
Route::post('barang', 'BarangController@add');