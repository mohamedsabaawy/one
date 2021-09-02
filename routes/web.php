<?php

use Illuminate\Support\Facades\Route;

define('STORAGE', 'public/');
define('PAGINATE', 1);


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
Route::get('',function (){
    return view('welcome');
});
//Auth::routes(['register' => false]);
Auth::routes();

Route::group(['prefix' => 'admin' ,'namespace'=>'Admin' ,'middleware' => 'auth'],function(){
   Route::get('','AdminController@index')->name('admin.index');
   Route::resource('providers','ProviderController');
});


Route::group(['prefix'=>'providers' ,'namespace' =>'Provider'],function (){
    Route::get('login','ProviderController@form')->name('providers.login.form')->middleware('guest:provider');
    Route::post('login','ProviderController@login')->name('providers.login')->middleware('guest:provider');
    Route::group(['middleware' => 'auth:provider'],function (){
        Route::get('','ProviderController@index')->name('providers.index');
        Route::resource('locations','LocationController');
    });
});

Route::domain('{user}.'.env('APP_URL'))->group(function (){
    // Route::get('','HomeController@index')->name('home');

    // return $user;
});
