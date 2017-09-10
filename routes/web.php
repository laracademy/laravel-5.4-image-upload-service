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

Route::get('/')->uses('Home\HomeController@index')->name('home');

Route::group(['namespace' => 'Uploads'], function() {
    Route::get('create')->uses('UploadController@create')->name('upload.create');
    Route::post('store')->uses('UploadController@store')->name('upload.store');
});

Route::group(['namespace' => 'Image'], function() {
    Route::get('view/{image}')->uses('ImageController@view')->name('image.view');
});