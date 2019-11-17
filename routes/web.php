<?php
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
use App\Fasilitas;
use App\Ruang;


Auth::routes();

Route::get('/get/cart', 'MasterController@getCart');
Route::post('/new/cart', 'MasterController@saveCart');
Route::get('/delete/cart/{id}', 'MasterController@deleteCart');
Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', function(){
////    return view('welcome');
////});
//Ruang
Route::get('/master/ruang', 'MasterController@ruang');
Route::get('/new/ruang', function(){
	return view('forms.formRuangBaru');
});
Route::post('/new/ruang/save', 'MasterController@insertRuang');
Route::get('/delete/ruang/{id}', 'MasterController@deleteRuang');
Route::get('/edit/ruang/{id}', function($id) {
    return view('forms.formEditRuang', ['ruang' => Ruang::find($id)]);
});
Route::post('/edit/ruang/save', 'MasterController@saveEditRuang');
//Fasilitas
Route::get('/get/inventory/{tgl}/{bln}/{thn}','MasterController@getInventory')->name('getInventory');
Route::get('/master/fasilitas', 'MasterController@fasil');
Route::get('/new/fasilitas', function(){
	return view('forms.formFasilBaru');
});
Route::get('/edit/fasilitas/{id}', function($id) {
    return view('forms.formEditFasil', ['fasil' => Fasilitas::find($id)]);
});
Route::post('/edit/fasilitas/save', 'MasterController@saveEditFasil');
Route::post('/new/fasilitas/save', 'MasterController@insertFasil');
Route::get('/delete/fasilitas/{id}', 'MasterController@deleteFasil');
//Transaksi
Route::get('/confirm/transaksi/{id}', 'MasterController@confirm');
Route::get('/reject/transaksi/{id}', 'MasterController@reject');
Route::get('/master/transaksi', 'MasterController@trans');
Route::get('/new/transaksi', 'MasterController@formTransaksi');
Route::post('/new/transaksi/save', 'MasterController@insertTrans');
Route::get('/delete/transaksi/{id}', 'MasterController@deleteTrans');


Route::get('/error','MasterController@coba');
