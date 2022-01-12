<?php

use App\Http\Controllers\produkController;
use App\Http\Controllers\berandaController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function (){
    Route::get('/', function(){
        return view('beranda');
    });
    Route::resource('produk', produkController::class)->middleware('role:admin');
});

Route::group(['prefix' => 'member', 'middleware' => ['auth', 'role:member']], function (){
    Route::get('/', function(){
        return view('beranda');
    });
    
});    