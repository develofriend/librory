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
    Route::post('/{member}/switch-status', 'UsersController@switchMemberStatus')->name('members.status.switch');

});

/*
|--------------------------------------------------------------------------
| Publishers Route
|--------------------------------------------------------------------------
*/
Route::prefix('publishers')->group(function () {

    Route::get('/all', 'PublishersController@all')->name('publishers.all');
    Route::get('/add', 'PublishersController@add')->name('publishers.add');
    Route::post('/save', 'PublishersController@save')->name('publishers.save');
    Route::get('/{publisher}/edit', 'PublishersController@edit')->name('publishers.edit');
    Route::post('/{publisher}/update', 'PublishersController@update')->name('publishers.update');

});

/*
|--------------------------------------------------------------------------
| Authors Route
|--------------------------------------------------------------------------
*/
Route::prefix('authors')->group(function () {

    Route::get('/all', 'AuthorsController@all')->name('authors.all');
    Route::get('/add', 'AuthorsController@add')->name('authors.add');
    Route::post('/save', 'AuthorsController@save')->name('authors.save');
    Route::get('/{author}/edit', 'AuthorsController@edit')->name('authors.edit');
    Route::post('/{author}/update', 'AuthorsController@update')->name('authors.update');

});

/*
|--------------------------------------------------------------------------
| Shelves Route
|--------------------------------------------------------------------------
*/
Route::prefix('shelves')->group(function () {

    Route::get('/all', 'ShelvesController@all')->name('shelves.all');
    Route::get('/add', 'ShelvesController@add')->name('shelves.add');
    Route::post('/save', 'ShelvesController@save')->name('shelves.save');
    Route::get('/{shelf}/edit', 'ShelvesController@edit')->name('shelves.edit');
    Route::post('/{shelf}/update', 'ShelvesController@update')->name('shelves.update');

});

/*
|--------------------------------------------------------------------------
| Categories Route
|--------------------------------------------------------------------------
*/
Route::prefix('categories')->group(function () {

    Route::get('/all', 'CategoriesController@all')->name('categories.all');
    Route::get('/add', 'CategoriesController@add')->name('categories.add');
    Route::post('/save', 'CategoriesController@save')->name('categories.save');
    Route::get('/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
    Route::post('/{category}/update', 'CategoriesController@update')->name('categories.update');

});

/*
|--------------------------------------------------------------------------
| Books Route
|--------------------------------------------------------------------------
*/
Route::prefix('books')->group(function () {

    Route::get('/all', 'BooksController@all')->name('books.all');
    Route::get('/add', 'BooksController@add')->name('books.add');
    Route::post('/save', 'BooksController@save')->name('books.save');
    Route::get('/{book}/edit', 'BooksController@edit')->name('books.edit');
    Route::post('/{book}/update', 'BooksController@update')->name('books.update');

});
