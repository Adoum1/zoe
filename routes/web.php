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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/** Route admin */

Route::group(['as'=>'admin.','prefix'=> 'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']],
    function (){
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    });

/** End Route admin  */


/** Route gestionnaire*/

Route::group(['as'=>'gestionnaire.','prefix'=> 'gestionnaire', 'namespace'=>'Gestionnaire', 'middleware'=>['auth','gestionnaire']],
    function (){
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    });

/** End Route admin  */