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

Route::get('/', function () {
    return view('welcome');
});

// Join Query
Route::get('inner-join','QueryController@innerJoin');
Route::get('left-join','QueryController@leftJoin');
Route::get('right-join','QueryController@rightJoin');
Route::get('cross-join','QueryController@crossJoin');
Route::get('advance-join','QueryController@advanceJoin');
Route::get('sub-query-join','QueryController@subQueryJoin');

// Eloquant Relation


Route::get('user', function(){
    factory(\App\User::class, 4)->create();
    \App\Address::create([
        'user_id' => 1,
        'country' => 'Bangladesh',
    ]);
    \App\Address::create([
        'user_id' => 2,
        'country' => 'Nepal',
    ]);
    \App\Address::create([
        'user_id' => 3,
        'country' => 'Pakistan',
    ]);
    \App\Address::create([
        'user_id' => 4,
        'country' => 'Malaysia',
    ]);
    return 'Success';
});

// 
Route::get('eloquent', 'EloquenController@index');
