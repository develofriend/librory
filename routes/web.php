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

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Members Route
|--------------------------------------------------------------------------
*/
Route::prefix('members')->group(function () {

    Route::get('/all', 'UsersController@allMembers')->name('members.all');
    Route::get('/add', 'UsersController@addMember')->name('members.add');
    Route::post('/save', 'UsersController@saveMember')->name('members.save');
    Route::get('/{member}/edit', 'UsersController@editMember')->name('members.edit');
    Route::post('/{member}/update', 'UsersController@updateMember')->name('members.update');

});
