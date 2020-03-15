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
Route::get('/', fn () => view('index'));

Route::resource('checklist', 'ChecklistController');

Route::prefix('api')->group(function () {
    Route::prefix('attachments')->group(function () {
        Route::post('/', 'AttachmentsController@store');
        Route::get('/{id}', 'AttachmentsController@show');
        Route::delete('/{id}', 'AttachmentsController@destroy');
    });
    Route::prefix('checklists')->group(function () {
        Route::get('/', 'Api\ChecklistsController@index');
    });
});
