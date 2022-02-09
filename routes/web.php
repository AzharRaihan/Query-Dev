<?php

use App\Task;
use App\User;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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


// Join Query
Route::get('inner-join','QueryController@innerJoin');
Route::get('left-join','QueryController@leftJoin');
Route::get('right-join','QueryController@rightJoin');
Route::get('cross-join','QueryController@crossJoin');
Route::get('advance-join','QueryController@advanceJoin');
Route::get('sub-query-join','QueryController@subQueryJoin');

// Eloquant Relation


Route::resource('post', PostController::class);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::get('image-upload','FileController@createForm');
Route::post('/image-upload','FileController@fileUpload')->name('imageUpload');

Route::get('delete-y/{id}', 'QueryController@deleteY');
Route::get('delete-a/{id}', 'QueryController@deleteA');
Route::get('delete-g/{id}', 'QueryController@deleteG');


Route::resource('parent', ParentController::class);
Route::resource('child', ChildController::class);
