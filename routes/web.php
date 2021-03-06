<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

    Route::get('/', 'UserController@loginIndex')->name('login');

    Route::post('/authenticate', 'UserController@authenticate');
    Route::get('/register', 'UserController@registerIndex');
    Route::post('register', 'UserController@register');
    Route::get('/redirect', 'UserController@redirectTo');


    Route::middleware(['auth', 'can:admin'])->group(function () {
        Route::get('/admin', 'AdminController@index');
        Route::get('/admin/create-user', 'AdminController@create');
        Route::post('/admin', 'AdminController@store');
        Route::put('/admin/{user}', 'AdminController@update');
        Route::delete('/admin/{user}', 'AdminController@delete');
        Route::get('/admin/{user}/edit', 'AdminController@edit');
    
    });

    Route::middleware(['auth', 'can:operator'])->group(function () {
        Route::get('/operator', 'OperatorController@index');
        Route::get('/operator/akta-kelahiran', 'OperatorController@akta');
        Route::get('/operator/akta-kelahiran/{akta}/open-pdf/', 'OperatorController@openPdf');
        Route::get('/operator/akta-kelahiran/{akta}', 'OperatorController@createReview');
        Route::put('/operator/akta-kelahiran/{akta}', 'OperatorController@storeReview');

    });

    Route::middleware(['auth', 'can:kasie'])->group(function () {

        Route::get('/kasie', 'KasieController@index');
        Route::get('/kasie/akta-kelahiran', 'KasieController@akta');
        Route::get('/kasie/akta-kelahiran/{akta}/open-pdf/', 'KasieController@openPdf');
        Route::get('/kasie/akta-kelahiran/{akta}', 'KasieController@createReview');
        Route::put('/kasie/akta-kelahiran/{akta}', 'KasieController@storeReview');
    });

    Route::middleware(['auth', 'can:kabid'])->group(function () {
        Route::get('/kabid', 'KabidController@index');
        Route::put('/kabid/akta-kelahiran/review-checked', 'KabidController@reviewChecked');
        Route::get('/kabid/akta-kelahiran', 'KabidController@akta');
        Route::get('/kabid/akta-kelahiran/{akta}/open-pdf/', 'KabidController@openPdf');
        Route::get('/kabid/akta-kelahiran/{akta}', 'KabidController@createReview');
        Route::put('/kabid/akta-kelahiran/{akta}', 'KabidController@storeReview');

    });
    
    Route::middleware(['auth', 'can:kadis'])->group(function () {

        Route::get('/kadis', 'KadisController@index');
        Route::put('/kadis/akta-kelahiran/review-checked', 'KadisController@reviewChecked');
        Route::get('/kadis/akta-kelahiran', 'KadisController@akta');
        Route::get('/kadis/akta-kelahiran/{akta}/open-pdf/', 'KadisController@openPdf');
        Route::get('/kadis/akta-kelahiran/{akta}', 'KadisController@createReview');
        Route::put('/kadis/akta-kelahiran/{akta}', 'KadisController@storeReview');
    });

    Route::middleware(['auth', 'can:loket'])->group(function () {

        Route::get('/operator-loket', 'OperatorLoketController@index');
        Route::put('/operator-loket/pengambilan/{akta}', 'OperatorLoketController@setPengambilan');
    });
    
    
    Route::get('riwayat', 'RiwayatController@index')->middleware('auth');
    Route::get('status-akun', 'CekStatusPengajuanController@index');
    Route::get('status-akun/cari', 'CekStatusPengajuanController@index');

    Route::middleware(['auth', 'verifikasi'])->group(function () {

        Route::get('/dashboard-user', 'UserController@dashboard');
        Route::get('riwayat-user', 'User\RiwayatController@index');
        //akta kelahiran
        Route::put('akta-kelahiran/pengambilan/{akta}','User\AktaKelahiranController@pengambilan');
        Route::get('akta-kelahiran', 'User\AktaKelahiranController@index');
        Route::get('akta-kelahiran/create', 'User\AktaKelahiranController@create');
        Route::post('akta-kelahiran', 'User\AktaKelahiranController@store');
        Route::get('akta-kelahiran/{akta}/edit', 'User\AktaKelahiranController@edit');
        Route::put('akta-kelahiran/{akta}', 'User\AktaKelahiranController@update');
        Route::get('profil', 'User\ProfilController@index');
        Route::put('profil/{user}', 'User\ProfilController@update');
    });


Route::view('/thanks', 'login.notifikasi');
Route::get('notifikasi', 'UserController@notification');

Route::get('verifikasi-index', 'UserController@verifikasiIndex');
Route::post('verifikasi', 'UserController@verifikasi');

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return redirect('/');
});