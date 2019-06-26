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
})->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');



/** Route admin */

Route::group(['as'=>'admin.','prefix'=> 'admin', 'namespace'=>'Admin','middleware'=>['auth','admin']],
    function (){
        Route::get('dashboard','DashboardController@index')->name('dashboard');

        /** route espece */
        Route::resource('espece', 'EspeceController');

        /** route Famille */
        Route::resource('famille', 'FamilleController');

        /** route embranchement */
        Route::resource('embranchement', 'EmbranchementController');

        /** route Genre */
        Route::resource('genre', 'GenreController');

        /** route Ordre */
        Route::resource('ordre', 'OrdreController');

        /** route 'Classe */
        Route::resource('classe', 'ClasseController');

        /** route sites de stockage */
        Route::resource('site', 'SiteController');

        /** route structures de stockage */
        Route::resource('stockage', 'StockageController');

    });

/** End Route admin  */


/** Route gestionnaire*/

Route::group(['as'=>'gestionnaire.','prefix'=> 'gestionnaire', 'namespace'=>'Gestionnaire', 'middleware'=>['auth','gestionnaire']],
    function (){
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    });

/** End Route admin  */