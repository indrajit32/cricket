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


Route::resource('/','TeamsController');

Route::resource('teams','TeamsController');

Route::get('teams/{id}', 'TeamsController@show');
Route::get('teams.leaderboard', 'TeamsController@leaderboard');

Route::resource('Players','PlayersController');
Route::resource('Points','PointsController');
Route::resource('matches','MatchesController');
Route::get('matches/index', 'MatchesController@index');
Route::post('matches/store', 'MatchesController@store');
