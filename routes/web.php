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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services')->name('services');

Route::resource('products', 'ProductsController');

// Route::post('/products/store', 'ProductsController@store');
// Route::get('validate', function()
// {
//     return View::make('products/store');
// });




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
