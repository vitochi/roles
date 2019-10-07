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

Route::get('/home', 'HomeController@index')->name('home');

//Routes

Route::middleware(['auth'])->group(function() {
    
 //Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
                         ->middleware('can:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
                         ->middleware('can:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
                         ->middleware('can:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
                         ->middleware('can:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
                         ->middleware('can:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
                         ->middleware('can:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
                         ->middleware('can:roles.edit');

 //Products
    Route::post('products/store', 'ProductController@store')->name('products.store')
                         ->middleware('can:products.create');

    Route::get('products', 'ProductController@index')->name('products.index')
                         ->middleware('can:products.index');

    Route::get('products/create', 'ProductController@create')->name('products.create')
                         ->middleware('can:products.create');

    Route::put('products/{product}', 'ProductController@update')->name('products.update')
                         ->middleware('can:products.edit');

    Route::get('products/{product}', 'ProductController@show')->name('products.show')
                         ->middleware('can:products.show');

    Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
                         ->middleware('can:products.destroy');

    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
                         ->middleware('can:products.edit');

 //Users
    Route::get('users', 'UserController@index')->name('users.index')
                         ->middleware('can:users.index');
    
    Route::put('users/{role}', 'UserController@update')->name('users.update')
                         ->middleware('can:users.edit');

    Route::get('users/{role}', 'UserController@show')->name('users.show')
                         ->middleware('can:users.show');

    Route::delete('users/{role}', 'UserController@destroy')->name('users.destroy')
                         ->middleware('can:users.destroy');

    Route::get('users/{role}/edit', 'UserController@edit')->name('users.edit')
                         ->middleware('can:users.edit');
});

