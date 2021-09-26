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


Route::resource('post', PostController::class);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dummy', function(){
    // factory(App\User::class, 3)->create();
    // factory(App\Project::class, 3)->create();
    $project = Project::create([
        'title' => 'Project A',
    ]);
    $user1 = User::create([
        'name' => 'Azhar Raihan',
        'email' => 'azhar@gmail.com',
        'password' => Hash::make('password'),
        'project_id' => $project->id
    ]);
    $user2 = User::create([
        'name' => 'Azhar Raihan 2',
        'email' => 'azhar2@gmail.com',
        'password' => Hash::make('password'),
        'project_id' => $project->id
    ]);
    $task1 = Task::create([
        'title' => 'Task 1 for project 1 by user 1',
        'user_id' => $user1->id
    ]);
    $task2 = Task::create([
        'title' => 'Task 2 for project 1 by user 1',
        'user_id' => $user1->id
    ]);
    $task3 = Task::create([
        'title' => 'Task 3 for project 1 by user 1',
        'user_id' => $user2->id
    ]);
});

Route::get('retrive', function(){
    $project = Project::find(1);
    dd($project->users[1]->tasks);
});


Route::get('image-upload','FileController@createForm');
Route::post('/image-upload','FileController@fileUpload')->name('imageUpload');
