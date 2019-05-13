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

Route::redirect('/', '/bolao')->secure();

Auth::routes();

Route::namespace('Admin\\')->group(function (){
    Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
        Route::resource('user', 'UserController');
    });

    Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
        Route::resource('campeonato', 'CampeonatoController');
    });

    Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
        Route::resource('time', 'TimeController');
    });

    Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
        Route::resource('jogo', 'JogoController');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::view('/{path?}/{segment?}/{id?}', 'layouts.app');
});
