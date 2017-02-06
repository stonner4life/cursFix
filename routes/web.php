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
    return view('auth/login');
});

Route::get('/roomtasks','RoomTaskController@index');
Route::get('/roomtasks/create','RoomTaskController@create');

Route::get('/roomtasks/{roomtasks}','RoomTaskController@show');
Route::post('/roomtasks','RoomTaskController@store');


Route::put('/roomtasks/{id}/edit','RoomTaskController@update');

Route::get('/roomtasks/{id}/edit','RoomTaskController@edit');
////////////////////////////////////////////////////////////////
Route::get('/roomlist','RoomListController@index');
Route::get('/roomlist/create','RoomListController@create');
Route::post('/roomlist','RoomListController@store');
////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', 'HomeController@index');
////////////////////////////////////////////////////////////////


//Route::patch('roomtasks/{id}/edit', function () {
//    $this->validate(request(), [
//        'description' => 'required|min:10'
//    ]);
//
//    RoomTask::updating(request(['roomname', 'description']));
//
//    //Redirect to Home page
//
//    return redirect('/roomtasks');});