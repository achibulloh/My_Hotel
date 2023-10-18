<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login')->middleware('guest');
Route::get('/register', 'App\Http\Controllers\AuthController@register')->name('register')->middleware('guest');
// Route::get('/', function () {
//     return view('auth/login');
// });
// ->middleware('role:admin,manager,karyawan,user')
// Process Login
Route::post('/proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::post('/proses_register', 'App\Http\Controllers\AuthController@prosesregister')->name('proses_register');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dasboard');
// End Process Login

// Dashboard
Route::get('/cek-in', 'App\Http\Controllers\DashboardController@cekin')->name('cek-in');
// Route::post('/masukkamar', 'App\Http\Controllers\DashboardController@check_in')->name('masukkamar');
Route::get('/cek-out', 'App\Http\Controllers\DashboardController@cekout')->name('cek-out');
Route::get('/kategori', 'App\Http\Controllers\DashboardController@kategorii')->name('kategori');
Route::post('/tambah_kategori', 'App\Http\Controllers\DashboardController@tambah_kategori')->name('tambah_kategori');
Route::put('/update_kategori/{id}', 'App\Http\Controllers\DashboardController@update_kategori')->name('update_kategori');
Route::delete('/hapus_kategori/{id}', 'App\Http\Controllers\DashboardController@hapus_kategori')->name('hapus_kategori');
Route::get('/kamar', 'App\Http\Controllers\DashboardController@kamarr')->name('kamar');
Route::post('/tambah_kamar', 'App\Http\Controllers\DashboardController@tambah_kamarr')->name('tambah_kamar');
Route::delete('/hapus_kamar/{id}', 'App\Http\Controllers\DashboardController@hapus_kamar')->name('hapus_kamar');
Route::put('/update_kamar/{id}', 'App\Http\Controllers\DashboardController@update_kamar')->name('update_kamar');
Route::get('/admin', 'App\Http\Controllers\DashboardController@adminn')->name('admin');
Route::post('/tambah_admin', 'App\Http\Controllers\DashboardController@tambah_admin')->name('tambah_admin');
Route::put('/update_admin/{id}', 'App\Http\Controllers\DashboardController@update_admin')->name('update_admin');
Route::delete('/hapus_admin/{id}', 'App\Http\Controllers\DashboardController@hapus_admin')->name('hapus_admin');
Route::get('/manager', 'App\Http\Controllers\DashboardController@managerr')->name('manager');
Route::post('/tambah_manager', 'App\Http\Controllers\DashboardController@tambah_manager')->name('tambah_manager');
Route::put('/update_manager/{id}', 'App\Http\Controllers\DashboardController@update_manager')->name('update_manager');
Route::delete('/hapus_manager/{id}', 'App\Http\Controllers\DashboardController@hapus_manager')->name('hapus_manager');
Route::get('/karyawan', 'App\Http\Controllers\DashboardController@karyawann')->name('karyawan');
Route::post('/tambah_karyawan', 'App\Http\Controllers\DashboardController@tambah_karyawan')->name('tambah_karyawan');
Route::put('/update_karyawan/{id}', 'App\Http\Controllers\DashboardController@update_karyawan')->name('update_karyawan');
Route::delete('/hapus_karyawan/{id}', 'App\Http\Controllers\DashboardController@hapus_karyawan')->name('hapus_karyawan');
Route::get('/user', 'App\Http\Controllers\DashboardController@userr')->name('user');
Route::post('/tambah_user', 'App\Http\Controllers\DashboardController@tambah_user')->name('tambah_user');
Route::put('/update_user/{id}', 'App\Http\Controllers\DashboardController@update_user')->name('update_user');
Route::delete('/hapus_user/{id}', 'App\Http\Controllers\DashboardController@hapus_user')->name('hapus_user');
Route::get('/activity', 'App\Http\Controllers\DashboardController@activity_log')->name('activity');
Route::get('/kalender', 'App\Http\Controllers\DashboardController@kalenderrr')->name('kalender');
Route::post('/transaksi', 'App\Http\Controllers\DashboardController@transakssi')->name('transaksi');
Route::get('/laporan', 'App\Http\Controllers\DashboardController@laporann')->name('laporan');
Route::get('/filter', 'App\Http\Controllers\DashboardController@filterr')->name('filter');
Route::get('/profile', 'App\Http\Controllers\DashboardController@profilee')->name('profile');
// End Dashboard