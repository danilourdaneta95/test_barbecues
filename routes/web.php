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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/Register', function () {
    return view('user.register');
})->name('Register');
Route::post('/Register/store', 'UserController@store')->name('RegisterStore');

//Route::post('/login', 'LoginController@store')->name('Login');
Route::get('logout', 'Auth\LoginController@logout');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/Home', 'HomeController@index')->name('Home');
    
    Route::get('/Barbecues', 'BarbecueController@index')->name('Barbecues');
    Route::get('/Barbecues/New', 'BarbecueController@create')->name('NewBarbecue');
    Route::post('/Barbecues/store', 'BarbecueController@store')->name('BarbecueStore');
	Route::get('/Barbecues/{id}', 'BarbecueController@show')->name('BarbecueShow');
    Route::post('/Barbecues/rent', 'BarbecueController@taken')->name('BarbecueRent');
    
	Route::get('/Profile', function () {
        return view('user.profile');
    })->name('Profile');
    Route::post('/Profile/save', 'UserController@edit')->name('ProfileSave');

    Route::get('/User/{id}', 'UserController@show')->name('UserShow');
});


