<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/', function () {
    return view('home');
});

Route::get('/catalog', function () {
    return view('catalog.index');
});

Route::get('/catalog/show/{id}', function ($id) {
    return view('catalog.show', array('id' => $id));
});

Route::get('/catalog/create', function () {
    return view('catalog.create');
});

Route::get('/catalog/edit/{id}', function ($id) {
    return view('catalog.edit', array('id' => $id));
});
*/



Route::get('/','HomeController@getHome');

Route::get('/catalog',['middleware'=>'auth'],'CatalogController@getIndex');

Route::get('/catalog/show/{id}',['middleware'=>'auth'],'CatalogController@getShow');

Route::get('/catalog/create',['middleware'=>'auth'],'CatalogController@getCreate');

Route::get('/catalog/edit/{id}','CatalogController@getEdit');


//Route::get('/login', function () {
//    return view('auth.login');
//});

//Route::get('/logout', function () {
//    return view('logout');
//});

Route::get('/home',['middleware'=>'auth'], 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home',['middleware'=>'auth'], 'HomeController@index')->name('home');
