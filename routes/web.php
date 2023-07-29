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

Route::get('/', 'DataController@index')->name('index');
Route::get('/insertDataFromURL', 'DataController@insertDataFromURL')->name('insertFromURLS');
Route::get('/getDatatables', ['uses' => 'DataController@getDatatables', 'as' => 'getDatatables'])->name('datatables');
Route::post('/deleteData', 'DataController@postDeleteData')->name('deletePost');
Route::post('/editData', 'DataController@postEditData')->name('editPost');
Route::post('/addData', 'DataController@postAddNewData')->name('addPost');