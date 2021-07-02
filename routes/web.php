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

//home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@viewCreate')->name('create.show');
Route::post('/create', 'HomeController@createStudent')->name('create.student');
Route::get('/edit/{id}', 'HomeController@viewEdit')->name('edit.show');
Route::post('/edit', 'HomeController@updateStudent')->name('update.student');
Route::get('/delete/{id}', 'HomeController@deleteStudent')->name('delete.student');

//edit file
Route::get('/user/file', 'HomeController@showfile')->name('show.file');
Route::post('/user/file', 'HomeController@updatefile')->name('update.file');


//gallery
Route::get('/user/gallery', 'GalleryController@index')->name('gallery');
Route::get('/user/gallery/create', 'GalleryController@viewImageAdd')->name('show.imageAdd');
Route::post('/user/gallery/create', 'GalleryController@addImage')->name('store.imageAdd');
Route::get('/user/gallery/edit/{id}', 'GalleryController@viewEditImage')->name('show.editImage');
Route::post('/user/gallery/update', 'GalleryController@updateImage')->name('update.Image');
Route::get('/user/gallery/delete/{id}', 'GalleryController@deleteImage')->name('delete.Image');

