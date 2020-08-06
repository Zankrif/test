<?php

use App\Http\Middleware\UserPermissionCheck;
use App\Http\Middleware\UserRoleCheck;
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


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/',"ProductController@index")->name('main.index');
Route::get('/brand/{brand}','ProductController@searchByBrand')->name('main.brand');
Route::get('/category/{category}','ProductController@searchByCategory')->name('main.category');
Route::post('/search','ProductController@search')->name('main.search');
Route::middleware('auth')->group(function(){
    Route::get('/addToBasket/{product}','BasketController@addToOrder')->name('add.to.basket');
    Route::get('/basket','BasketController@show')->name('basket.index');
    Route::get('/basket/product/{product}/increase','BasketController@increase')->name('basket.increase');
    Route::get('/basket/product/{product}/decrease','BasketController@decrease')->name('basket.decrease');
    Route::get('/basket/product/{product}/delete','BasketController@delete')->name('basket.delete');
    Route::get('/basket/pay','BasketController@pay')->name('basket.pay');
    Route::middleware(UserRoleCheck::class)->group(function(){
        Route::get('/store','StoreController@index')->name('store.index');

        Route::middleware(UserPermissionCheck::class)->group(function(){

            Route::get('/store/create','StoreController@show')->name('store.create.index');    
            Route::post('/store/create','StoreController@create')->name('store.create.post');
            Route::post('/store/{store}','StoreController@post')->name('store.post');

            Route::get('/store/{store}/product/add',"ProductController@show")->name('product.add.index');
            Route::post('/store/{store}/product/add',"ProductController@post")->name('product.add.post');
    
            Route::get('/store/{store}/products/','StoreController@products')->name('store.products.index');
            Route::get('/store/{store}/delete/product/{id}','StoreController@delete')->name('store.product.delete');
            Route::get('/store/{store}/edit/product/{product}','StoreController@edit')->name('store.product.edit.index');
            Route::post('store/{store}/edit/produtct/{product}','StoreController@updateProduct')->name('store.product.edit.post');
        });
    });
});