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

Route::redirect('/', 'home');

Route::view('home', 'landing.web.landing')->name('home');
Route::view('advokasi', 'landing.web.advokasi')->name('advokasi');
Route::view('pengelolaanrisiko', 'landing.web.pengelolaanrisiko')->name('pengelolaanrisiko');
Route::view('tinjut', 'landing.web.aparatpemeriksa')->name('tinjut');
Route::view('pengaduan', 'landing.web.pengaduan')->name('pengaduan');
Route::view('pengendalianintern', 'landing.web.pengendalianintern')->name('pengendalianintern');

Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

Route::middleware('loggedin:admin,es4,es3,es2')->group(function () {

    Route::redirect('backoffice', 'backoffice/dashboard');

    Route::prefix('backoffice')->group(function () {
        Route::view('sidangperkara', 'admin.web.sidangperkara')->name('sidangperkara');
        Route::view('perkara', 'admin.web.perkara')->name('perkara');
        Route::view('pengaduan', 'admin.web.pengaduan')->name('aduan');
        Route::view('tinjut', 'admin.web.tinjut')->name('tindaklanjut');
        Route::view('aparatpemeriksa', 'admin.web.aparatpemeriksa')->name('aparat');

        Route::view('resetpass', 'admin.web.resetpass')->name('resetpass');
    });
});

Route::prefix('backoffice')->middleware('loggedin:admin')->group(function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'Admin\DashboardController@index']);

    Route::view('jenisperkara', 'admin.web.jenisperkara')->name('jenisperkara');
    Route::view('jenisaduan', 'admin.web.jenisaduan')->name('jenisaduan');
    Route::view('jenisstatustinjut', 'admin.web.jenisstatustinjut')->name('jenisstatustinjut');
    Route::view('jenispemeriksaantinjut', 'admin.web.jenispemeriksaantinjut')->name('jenispemeriksaantinjut');

    Route::view('peraturan', 'admin.web.peraturan')->name('peraturan');
    Route::view('kajianhukum', 'admin.web.kajianhukum')->name('kajianhukum');

    Route::view('unit', 'admin.web.unit')->name('unit');

    Route::view('user', 'admin.web.user')->name('user');
});
