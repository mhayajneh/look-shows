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
Route::get('/episode/{episodeID}/like','EpisodesController@episodeLike')->name('episodeLike');
Route::get('/series/{episodeID}/follow','EpisodesController@seriesFollow')->name('seriesFollow');

Route::get('/', 'WelcomePageController@index')->name('welcomePage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('library')->group(function () {
    Route::prefix('series/{seriesID}')->group(function () {
        Route::get('/episodes','EpisodesController@seriesEpisodesList')->name('series');
        Route::get('/episode/{episodeID}','EpisodesController@episodeDetails')->name('episodeDetails');

    });
});

route::get('/search','EpisodesController@search')->name('search');


Route::prefix('admin')->group(function () {
    Route::get('/dashboard/','admin\DashboardController@index')->name('adminPanel');
    Route::resource('users','admin\UsersController');
    Route::resource('series','admin\SeriesController');
    Route::resource('episodes','admin\EpisodesController');
});
