<?php
use Illuminate\Http\Request;
use Illuminate\Auth\EloquentUserProvider;

use App\User;

$role = ['admin','kepsek','siswa','kesiswaan','bk','osis'];

Auth::routes();
Route::group(['middleware' => 'auth',$role], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});
Route::get('/', 'DataController@index');


Route::group(['middleware' => 'auth','admin'], function(){
    // Admin
    Route::resource('/Data', 'DataController');
    Route::get('data/hapus/{id}', 'DataController@destroy');
    Route::get('dataTable', 'DataController@dataTable')->name('data.datatable');
    Route::get('datasiswa', 'DataController@datasiswa');
    Route::get('dataangkatan', 'DataController@dataAngkatan');
    Route::post('angkatan', 'DataController@kelas_id')->name('angkatan');
    Route::get('kelas/{id}', 'DataController@dataKelas');
    Route::post('getdata', 'DataController@get_data')->name('getdata');
    // Kepala Sekolah
    Route::resource('/Kepsek', 'KepsekController');
    Route::get('Kepsek/hapus/{id}', 'KepsekController@destroy');
    // Khusus Admin
    Route::post('bayarspp', 'DataController@bayarspp')->name('bayarspp');
    Route::resource('/Admin', 'AdminController');
    Route::post('get_data', 'AdminController@get_json');
    Route::get('data_bayar', 'AdminController@data_bayar');
    Route::get('historypembayaran', 'AdminController@historypembayaran');
    // Bendahara
    Route::resource('/Bendahara', 'BendaharaController');
});

Route::group(['middleware' => 'auth','siswa'], function(){
    Route::resource('Siswa', 'SiswaController');
    Route::get('Pembayaran/{bulan}', 'SiswaController@form_pembayaran')->name('pembayaran');
});