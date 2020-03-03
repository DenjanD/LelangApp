<?php
use Illuminate\Http\Request;
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

//Home API
Route::get('/', function (Request $request) {
    if($request->session()->exists('userlogin')) {
        if ($request->session()->exists('userlevel')) {
            return view('adminpetugas/dashboard');
        }
        return view('masyarakat/home');
    }
    return view('login');
});

//Secret API
Route::get('adpetugasmin', function (Request $request) {
    if($request->session()->exists('userlogin')) {
        return view('/');   
    }
    else {
        return view('adminpetugas');
    }
});

//Login APIs
Route::get('logattempt', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::get('register', 'RegisterController@index');
Route::post('register/regattempt', 'RegisterController@add');

//Dashboard APIs
Route::get('dashboard', function(){
    return view('adminpetugas/dashboard');
});

//Level APIs
Route::get('level', 'LevelController@read');
Route::post('level', 'LevelController@add');

//Petugas APIs
Route::get('petugas', 'PetugasController@index');
Route::post('petugas', 'PetugasController@add');

//Masyarakat APIs
Route::get('masyarakat', 'MasyarakatController@read');
Route::post('masyarakat', 'MasyarakatController@add');

//Barang APIs
Route::get('barang', 'BarangController@index');
Route::get('barang/{id}', 'BarangController@detailbarang');
Route::post('barang', 'BarangController@add');
Route::post('barang/photo', 'BarangController@photo');