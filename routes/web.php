<?php

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

Route::get('/', 'IndexController@index');

Route::get('home', function () {
    return view('home');
});

Route::get('data_peminjam', function () {
    return view('peminjams/data_peminjam');
});

Route::get('lihat_data_peminjam', function () {
	$peminjam = ['Nafi',
				'Helmi',
				'Aldianto'];
    return view('peminjams/lihat_data_peminjam', compact('peminjam'));
});

Route::get('/peminjam', 'PeminjamController@index');

Route::get('peminjam/create', 'PeminjamController@create')->name('peminjam.create');

Route::get('peminjam/edit/{id}', 'PeminjamController@edit')->name('peminjam.edit');

Route::post('peminjam/update/{id}', 'PeminjamController@update')->name('peminjam.update');

Route::post('peminjam/delete/{id}', 'PeminjamController@destroy')->name('peminjam.destroy');

Route::post('peminjam', 'PeminjamController@store')->name('peminjam.store');

Route::get('coba_collection', 'PeminjamController@CobaCOllection');

Route::get('collection_first', 'PeminjamController@collection_first');

Route::get('collection_last', 'PeminjamController@collection_last');

Route::get('collection_count', 'PeminjamController@collection_count');

Route::get('collection_take', 'PeminjamController@collection_take');

Route::get('collection_pluck', 'PeminjamController@collection_pluck');

Route::get('collection_where', 'PeminjamController@collection_where');

Route::get('collection_wherein', 'PeminjamController@collection_wherein');

Route::get('collection_toarray', 'PeminjamController@collection_toarray');

Route::get('collection_tojson', 'PeminjamController@collection_tojson');

Route::get('biodata', function () {
    return 'Nama : Nafi Helmi <br> Nim : 3.34.19.0.21 <br> Alamat : Kendal <br> Hobi : Gambar';
});

Route::get('mahasiswa/{prodi}', function ($prodi) {
    return 'Mahasiswa Program Studi : '.$prodi;
});

Route::get('mahasiswa2/{prodi?}', function ($prodi=null) {
	if($prodi==null)
		return 'Data Program Studi Kosong';
	else 
    	return 'Mahasiswa Program Studi : '.$prodi;
});

Route::get('mahasiswa3/{prodi?}', function ($prodi='Teknik Informatika') {
    return 'Mahasiswa Program Studi : '.$prodi;
});

Route::get('biodata2', function () {
    return view('biodata2');
});

Route::group([], function() {
    	Route::get('/pertama', function () {
    	echo 'route pertama';
	});
    	Route::get('/kedua', function () {
   		echo 'route kedua';
	});
    	Route::get('/ketiga', function () {
   		echo 'route ketiga';
	});
});

Route::group(['prefix' => 'latihan'], function() {
    	Route::get('/satu', function () {
    	echo 'Latihan 1';
	});
    	Route::get('/dua', function () {
   		echo 'Latihan 2';
	});
    	Route::get('/tiga', function () {
   		echo 'Latihan 3';
	});
});

Route::group(['prefix' => 'admin'], function() {
	//url ke halaman home
    	Route::get('/', function () {
    	return 'Halaman Home Admin';
	});
    	Route::get('posts', function () {
   		return 'Halaman input data buku';
	});
    	Route::get('posts/simpan', function () {
   		echo 'Data berhasil disimpan';
	});
});

Route::name('kuliah')->group(function(){
	Route::get('teknik_informatika', function(){
		return "Kuliah di Program Studi Teknik Informatika";
	});
});