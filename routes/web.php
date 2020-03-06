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

Route::middleware('locale')->group(function () {
    Route::get('/', fn () => view('index'));
    Route::resource('checklist', 'ChecklistController');
});

Route::get('/locale/{key}', function ($language) {
    return back()->cookie(
        'locale',
        $language,
        60*60*24*365
    );
})->name('locale');

Route::prefix('api/attachments')->group(function () {
    Route::post('/', 'AttachmentsController@store');
    Route::get('/{id}', 'AttachmentsController@show');
    Route::delete('/{id}', 'AttachmentsController@destroy');
});
