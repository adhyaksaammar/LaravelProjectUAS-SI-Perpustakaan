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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
// Route::get('/logout', 'Auth\LoginController@logoutUser')->name('logoutuser');

Route::get('/Admin/dashboard', 'AdminController@index')->name('dashboard'); // view
Route::get('/', 'AuthAdmin\AdminLoginController@showlogin')->name('login.admin'); // form login
Route::post('/Admin/login', 'AuthAdmin\AdminLoginController@login')->name('admin.masuk'); // proses login
Route::get('/logoutadmin', 'AuthAdmin\AdminLoginController@logoutAdmin')->name('logoutAdmin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/pegawai', 'PegawaiController');	
Route::resource('/buku', 'BukuController');
Route::resource('/anggota', 'AnggotaController');
Route::resource('/peminjaman', 'PeminjamanController');
Route::resource('/kembali', 'KembaliController');
Route::resource('/denda', 'DendaController');

Route::post('jabar', 'PeminjamanController@jabar')->name('jabar');
Route::post('cari', 'KembaliController@cari')->name('cari');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
