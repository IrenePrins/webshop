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


Route::get('/users/{id}', function($id, $name){
    return 'This is user '. $name. 'with an id of'. $id;
});
*/

//if user visits /about then do function()

Route::get('/', 'ProductsController@index');
Route::resource('products', 'ProductsController');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::get('/search', 'searchController@search')->name('search');
Route::get('/filter', 'searchController@filter')->name('filter');

Auth::routes();


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/dashboard/status/{id}', 'DashboardController@status')->name('dashboard.status');
