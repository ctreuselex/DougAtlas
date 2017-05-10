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
    return view('welcome');
});
Route::get('/mirrorplane', 'MirrorplaneController@index');

Route::get('/mirrorplane/avery', 'MirrorplaneController@avery');
Route::get('/mirrorplane/andrei', 'MirrorplaneController@andrei');
Route::get('/mirrorplane/bono', 'MirrorplaneController@bono');
Route::get('/mirrorplane/chance', 'MirrorplaneController@chance');
Route::get('/mirrorplane/daud', 'MirrorplaneController@daud');
Route::get('/mirrorplane/denise', 'MirrorplaneController@denise');
Route::get('/mirrorplane/dominic', 'MirrorplaneController@dominic');
Route::get('/mirrorplane/fae', 'MirrorplaneController@fae');
Route::get('/mirrorplane/frederick', 'MirrorplaneController@frederick');
Route::get('/mirrorplane/herschel', 'MirrorplaneController@herschel');
Route::get('/mirrorplane/jeanne', 'MirrorplaneController@jeanne');
Route::get('/mirrorplane/kalli', 'MirrorplaneController@kalli');
Route::get('/mirrorplane/kianna', 'MirrorplaneController@kianna');
Route::get('/mirrorplane/koom', 'MirrorplaneController@koom');
Route::get('/mirrorplane/llaxine', 'MirrorplaneController@llaxine');
Route::get('/mirrorplane/lupe', 'MirrorplaneController@lupe');
Route::get('/mirrorplane/maximus', 'MirrorplaneController@maximus');
Route::get('/mirrorplane/gemini', 'MirrorplaneController@gemini');
Route::get('/mirrorplane/noemi', 'MirrorplaneController@noemi');
Route::get('/mirrorplane/rigel', 'MirrorplaneController@rigel');
Route::get('/mirrorplane/riza', 'MirrorplaneController@riza');
Route::get('/mirrorplane/rustom', 'MirrorplaneController@rustom');
Route::get('/mirrorplane/djerick', 'MirrorplaneController@djerick');
Route::get('/mirrorplane/seline', 'MirrorplaneController@seline');
Route::get('/mirrorplane/valkyr', 'MirrorplaneController@valkyr');
Route::get('/mirrorplane/vines', 'MirrorplaneController@vines');
Route::get('/mirrorplane/vriskvin', 'MirrorplaneController@vriskvin');
Route::get('/mirrorplane/zedrik', 'MirrorplaneController@zedrik');

Route::get('/mirrorplane/the-story', 'MirrorplaneController@thestory');
Route::get('/mirrorplane/cts-timeline', 'MirrorplaneController@ctstime');
