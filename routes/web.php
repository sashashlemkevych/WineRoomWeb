<?php

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

Route::get('/', [App\Http\Controllers\MainController::class, 'main'])->name('main');

Route::get('/about',[App\Http\Controllers\MainController::class, 'about'])->name('about');

Route::post('/about/check',[App\Http\Controllers\MainController::class, 'about_check'])->name('about_check');

Route::get('/addwine',[App\Http\Controllers\MainController::class, 'addwine'])->name('addwine');

Route::post('/addwine/check',[App\Http\Controllers\MainController::class, 'addwine_check'])->name('addwine_check');

Route::get('/moredetalis',[App\Http\Controllers\MainController::class, 'moredetalis'])->name('moredetalis');

Route::get('/moredetalis/{id}',[App\Http\Controllers\MainController::class, 'moredetalis_id'])->name('moredetalis_id');

Route::get('/search',[App\Http\Controllers\MainController::class, 'search'])->name('search');

Route::get('/basket',[App\Http\Controllers\MainController::class, 'basket'])->name('basket');

Route::post('/orders/create',[App\Http\Controllers\MainController::class, 'orders_create'])->name('orders_create');

Route::get('/deleteBasket/{id}',[App\Http\Controllers\BasketController::class, 'deleteBasket'])->name('deleteBasket');

Route::get('/deleteBasketA/{id}',[App\Http\Controllers\BasketController::class, 'deleteBasketA'])->name('deleteBasketA');

Route::post('/addToBasket/{id}',[App\Http\Controllers\BasketController::class, 'addToBasket'])->name('addToBasket');

Route::post('/addToBasketAcc/{id}',[App\Http\Controllers\BasketController::class, 'addToBasketAcc'])->name('addToBasketAcc');

Route::get('/UpdateInfo/{id}',[App\Http\Controllers\MainController::class, 'UpdateInfo'])->name('UpdateInfo');

Route::post('/UpdateInfo/{id}',[App\Http\Controllers\MainController::class, 'UpdateWine'])->name('UpdateWine');

Route::get('/UpdateInfo/delete/{id}',[App\Http\Controllers\MainController::class, 'deleteWine'])->name('deleteWine');

Route::get('/addAccessories',[App\Http\Controllers\MainController::class, 'addAccessories'])->name('addAccessories');

Route::post('/addAccessories/check',[App\Http\Controllers\MainController::class, 'addAccessories_check'])->name('addAccessories_check');

Route::get('/infoContact',[App\Http\Controllers\MainController::class, 'infoContact'])->name('infoContact');

Route::get('/deleteContact/{id}',[App\Http\Controllers\MainController::class, 'deleteContact'])->name('deleteContact');

Route::get('/Accessories',[App\Http\Controllers\MainController::class, 'Accessories'])->name('Accessories');

Route::get('/moreAccessories/{id}',[App\Http\Controllers\MainController::class, 'moreAccessories_id'])->name('moreAccessories_id');

Route::get('/moreAccessories',[App\Http\Controllers\MainController::class, 'moreAccessories'])->name('moreAccessories');

Route::get('/bokal',[App\Http\Controllers\MainController::class, 'bokal'])->name('bokal');

Route::get('/dekan',[App\Http\Controllers\MainController::class, 'dekan'])->name('dekan');

Route::get('/upakov',[App\Http\Controllers\MainController::class, 'upakov'])->name('upakov');

Route::get('/UpdateAccessories/{id}',[App\Http\Controllers\MainController::class, 'UpdateAccessories'])->name('UpdateAccessories');

Route::post('/UpdateAccessories/{id}',[App\Http\Controllers\MainController::class, 'UpdateAccessoriesInfo'])->name('UpdateAccessoriesInfo');

Route::get('/UpdateAccessories/delete/{id}',[App\Http\Controllers\MainController::class, 'deleteAccessories'])->name('deleteAccessories');


Route::resource('WineModels', 'App\Http\Controllers\ProductController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('Кабінет');
