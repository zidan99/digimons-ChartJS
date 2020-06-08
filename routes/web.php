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

Route::get('/', function () {
    return redirect()->route('digimons.index');
});

Route::get('/digimons/getData', 'DigimonController@getData')->name('digimons.get.data');
Route::resource('digimons', 'DigimonController');
