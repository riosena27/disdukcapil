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

Route::middleware(['auth', 'verifikasi'])->group(function () {

    Route::get('/dashboard', 'UserController@dashboard');

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