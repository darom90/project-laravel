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

Route::get('logout', 'Admin\Auth\LoginController@logout')->name('logout');
// Route::group(['prefix'=>'login'], function(){
    Route::get('/', function () {
        return view('auth.login');
    });
// });

Auth::routes();
Route::group(['prefix'=>'users'], function(){
    Route::get('/','admin\UserController@view')->name('view');
    Route::match(['GET', 'POST'], 'add', 'Admin\UserController@create');
    Route::match(['GET', 'POST'], 'edit/{id}', 'Admin\UserController@edit');
});

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin/allUser','admin\UserController@index')->name('admin/allUser');
