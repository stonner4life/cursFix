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
    return view('/welcome');
});

//////////////////////////////////////////////////////////////

Route::get('/users/{id}/edit','UserController@edit');

//////////////////////////////////////////////////////////////

Route::get('/roomtasks','RoomTaskController@index');
Route::get('/roomtasks/create','RoomTaskController@create');

Route::get('/roomtasks/{roomtasks}','RoomTaskController@show');
Route::post('/roomtasks/create','RoomTaskController@store');


Route::put('/roomtasks/{id}/edit','RoomTaskController@update');
Route::get('/roomtasks/{id}/edit','RoomTaskController@edit');
Route::get('/roomtasks/destroy/{id}','RoomTaskController@destroy');

////////////////////////////////////////////////////////////////
Route::get('/roomlist','RoomListController@index');

Route::get('/roomlist/create','RoomListController@create');
Route::get('/roomlist/{roomlist}','RoomListController@show');

Route::post('/roomlist','RoomListController@store');

Route::put('/roomlist/{id}/edit','RoomListController@update');

Route::get('/roomlist/{id}/edit','RoomListController@edit');


////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', 'HomeController@index');
////////////////////////////////////////////////////////////////


Route::get('datatables', 'DatatablesController@getIndex')
    ->name('datatables');
Route::get('datatables.data', 'DatatablesController@anyData')
    ->name('datatables.data');



Route::get('datatables/togglestatus/{id}', 'DatatablesController@ToggleStatus');

Route::get('datatables/show', 'DatatablesController@getId');

Route::get('datatables.byid', 'DatatablesController@getbyId')
    ->name('datatables.byid');




///////////////////////////////////////////////////

Route::get('/cartasks','CarTaskController@index');
Route::get('/cartask', 'CarTaskController@getCarTask')
    ->name('datatables.cardata');



Route::get('/cartaskid', 'CarTaskController@getbyId')
    ->name('datatables.carIddata');



Route::post('/cartasks/create','CarTaskController@store');
Route::get('cartasks/togglestatus/{id}', 'CarTaskController@ToggleStatus');
Route::get('cartasks/destroy/{id}','CarTaskController@destroy');

////////////////////////////////////////////////////////////////////////////
Route::get('/alllists','CarListController@index');
Route::post('/carlists/create','CarListController@store');









//Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//    return "this page requires that you be logged in and an Admin";
//}]);
