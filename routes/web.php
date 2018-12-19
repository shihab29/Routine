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

Route::get('/', 'pageController@fourTwoA');

Route::get('/42A', 'pageController@forthSecondA');
Route::get('/42B', 'pageCOntroller@forthSecondB');

Route::get('/42/A', 'pageController@fourTwoA');
Route::get('/42/B', 'pageController@fourTwoB');

Route::get('/41/A', 'pageController@fourOneA');
Route::get('/41/B', 'pageController@fourOneB');
Route::get('/41/C', 'pageController@fourOneC');

Route::get('/32/A', 'pageController@threeTwoA');
Route::get('/32/B', 'pageController@threeTwoB');

Route::get('/31/A', 'pageController@threeOneA');
Route::get('/31/B', 'pageController@threeOneB');
Route::get('/31/C', 'pageController@threeOneC');

Route::get('/22/A', 'pageController@twoTwoA');
Route::get('/22/B', 'pageController@twoTwoB');

Route::get('/21/A', 'pageController@twoOneA');
Route::get('/21/B', 'pageController@twoOneB');
Route::get('/21/C', 'pageController@twoOneC');

Route::get('/12/A', 'pageController@oneTwoA');
Route::get('/12/B', 'pageController@oneTwoB');

Route::get('/11/A', 'pageController@oneOneA');
Route::get('/11/B', 'pageController@oneOneB');
Route::get('/11/C', 'pageController@oneOneC');

//-------------- ClassRoom Route starts from here ------------------//

Route::get('theoryRoom/{roomNo}', 'theoryRoomController@theoryRoomFuntion');
Route::get('labRoom/{roomNo}', 'theoryRoomController@labRoomFuntion');

//-------------- ClassRoom Route Ends here ------------------//

//-------------- Teacher Route Starts from here --------------//

Route::get('/{teacherID}', 'teacherController@index');

//-------------- Teacher Route Ends here --------------//

//-------------- Calculate Total Time -----------------//

Route::get('/objectives/totalTime', 'pageController@totalTime');