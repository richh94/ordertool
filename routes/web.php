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

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('admin/restaurants', 'Admin\\RestaurantsController');
Route::resource('admin/products', 'Admin\\ProductsController');
Route::resource('admin/product-options', 'Admin\\ProductOptionsController');
Route::resource('admin/product-sub-options', 'Admin\\ProductSubOptionsController');
Route::resource('admin/meals', 'Admin\\MealsController');
Route::resource('admin/meal-order-rows', 'Admin\\MealOrderRowsController');
Route::resource('admin/users', 'Admin\\UsersController');

Route::get('meal/{meal_id}/order', ['as' => 'meal_id', 'uses' => 'User\\MealsController@order']);
Route::get('meal/{meal_id}/details', ['as' => 'meal_id', 'uses' => 'User\\MealsController@details']);
Route::post('meal/{meal_id}/placeOrder', ['uses' => 'User\\MealsController@placeOrder']);
Route::post('meal/{meal_id}/removeProduct/{row_id}', ['uses' => 'User\\MealsController@removeProduct']);
Route::post('meal/{meal_id}/close', ['uses' => 'User\\MealsController@close']);

Route::resource('meal', 'User\\MealsController');
