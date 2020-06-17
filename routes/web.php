<?php

use App\User;
use App\UserData;
use Illuminate\Support\Facades\Request;
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
    return view('welcome');
});

Auth::routes();
Route::get('/data', 'UserDataController@createData')->name('user.data');
Route::post('/data', 'UserDataController@storeData')->name('user.store');

Route::get('/profile/{user}/password', 'UserController@password')->name('user.password');
Route::patch('/profile/{user}/password', 'UserController@updatePassword')->name('user.updatePassword');
Route::get('/profile/{user}/email', 'UserController@email')->name('user.email');
Route::patch('/profile/{user}/email', 'UserController@updateEmail')->name('user.updateEmail');

Route::get('/profile', 'UserController@index')->name('profile');
Route::get('/profile/{user}/edit', 'UserDataController@edit')->name('user.edit');
Route::post('/profile/{user}/update', 'UserDataController@update')->name('user.update');
Route::get('/profile/pending', 'UserPendingController@pendingIndex')->name('user.pending');
Route::post('/profile/pending/request/{user}', 'UserPendingController@request')->name('user.request');
Route::post('/profile/pending/accept/{user}', 'UserPendingController@accept')->name('user.accept');
Route::post('/profile/pending/decline/{user}', 'UserPendingController@decline')->name('user.decline');

Route::get('/profile/{user}', 'UserController@show')->name('user.show');
Route::patch('/profile/{user}/picture', 'UserDataController@updatePicture')->name('user.updatePicture');
Route::delete('/profile/destroy/{user}', 'UserController@destroy')->name('user.delete');


Route::get('/profile/attributes/{user}', 'UserAttributesController@createAttributes')->name('userAttributes.create');
Route::post('/profile/attributes', 'UserAttributesController@storeAttributes')->name('userAttributes.store');

Route::get('/profile/gallery/{user}', 'UserGalleryController@createGallery')->name('gallery.create');
Route::post('/profile/gallery', 'UserGalleryController@storeGallery')->name('gallery.store');
Route::patch('/profile/gallery/{picture}', 'UserGalleryController@updateProfilePictureFromGallery')->name('gallery.update');
Route::delete('/profile/gallery/{gallery}', 'UserGalleryController@destroyGallery')->name('gallery.destroy');

Route::post('/search','UserDataController@search')->name('user.search');

Route::get('dates/profile/{user}/gallery', 'UserGalleryController@show')->name('gallery.target');
