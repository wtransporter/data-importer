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
    return view('index');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('clients', 'ClientsController@index')->name('clients');
    Route::get('roles', 'RolesController@index')->name('roles');
    Route::get('roles/create', 'RolesController@create')->name('role.create');
    Route::post('roles', 'RolesController@store')->name('roles.store');
    Route::delete('roles/{role}', 'RolesController@destroy')->name('roles.destroy');
    Route::get('import', 'ImportsController@create')->name('import');
    Route::post('import/store', 'ImportsController@store')->name('import.store');
    
});

Auth::routes();
