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
Route::get('/admin', 'AdminController@index')->name('');
Route::get('/admin/access', 'AdminController@access')->name('');
Route::get('/admin/user', 'UserController@index')->name('');
Route::get('/admin/user/add', 'UserController@add')->name('');
Route::get('/admin/user/view{id}', 'UserController@view')->name('');
Route::post('/admin/user/submit', 'UserController@insert')->name('');
Route::get('/admin/banner', 'BannerController@index')->name('');
Route::get('/admin/banner/add', 'BannerController@add')->name('');
Route::get('/admin/banner/edit{slug}', 'BannerController@edit')->name('');
Route::get('/admin/banner/view{slug}', 'BannerController@view')->name('');
Route::post('/admin/banner/submit', 'BannerController@insert')->name('');
Route::post('/admin/banner/update', 'BannerController@update')->name('');
Route::post('/admin/banner/softdelete', 'BannerController@softdelete')->name('');
