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


//Route::get('/', function ()    {
//    return view('index');
//});


Route::get('/','HomeController@index');
Route::get('/lienhe','HomeController@lienhe');
Route::post('/timkiem','HomeController@timkiem')->name('timkiem');

Route::group(['prefix'=>'sanpham','as'=>'sanpham.'], function () {
    Route::get('/cate/{id}','CategoryProductController@categoryp')->name('categoryp');
    Route::get('/ori/{id}','OriginProductController@originp')->name('originp');

});

Route::group(['prefix'=>'admin','as'=>'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/','LoginController@showLogin')->name('showLogin');
    Route::get('/logout','LoginController@logout')->name('logout');
    Route::post('/handle.login','LoginController@handleLogin')->name('handle-login');


    Route::get('/dashboard','DashboardController@index')->name('dashboard');

});

// Category
Route::group(['prefix'=>'category','as'=>'category.'], function () {
    Route::get('/','CategoriesController@index')->name('index');
    Route::get('/create','CategoriesController@create')->name('create');
    Route::post('/store','CategoriesController@store')->name('store');
    Route::get('/edit/{id}','CategoriesController@edit')->name('edit');
    Route::post('/update/{id}','CategoriesController@update')->name('update');
    Route::post('/delete/{id}','CategoriesController@destroy')->name('destroy');
});

//Origin
Route::group(['prefix'=>'origin','as'=>'origin.'], function () {
    Route::get('/','OriginsController@index')->name('index');
    Route::get('/create','OriginsController@create')->name('create');
    Route::post('/store','OriginsController@store')->name('store');
    Route::get('/edit/{id}','OriginsController@edit')->name('edit');
    Route::post('/update/{id}','OriginsController@update')->name('update');
    Route::post('/delete/{id}','OriginsController@destroy')->name('destroy');
});

//Product
Route::group(['prefix'=>'product','as'=>'product.'], function () {
    Route::get('/','ProductsController@index')->name('index');
    Route::get('/create','ProductsController@create')->name('create');
    Route::post('/store','ProductsController@store')->name('store');
    Route::get('/edit/{id}','ProductsController@edit')->name('edit');
    Route::post('/update/{id}','ProductsController@update')->name('update');
    Route::post('/delete/{id}','ProductsController@destroy')->name('destroy');
});
