
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/','App\Http\Controllers\UserController@login');                   
Route::get('/signup','App\Http\Controllers\UserController@signup');
Route::post('/adduser','App\Http\Controllers\UserController@store');
Route::get('/login','App\Http\Controllers\UserController@login');
Route::post('/login','App\Http\Controllers\UserController@loginCheck');

Route::get('/home','App\Http\Controllers\UserController@loadHome');
Route::get('/settings','App\Http\Controllers\UserController@settings');
Route::get('/changePass','App\Http\Controllers\UserController@changePass');
Route::get('/deactivate','App\Http\Controllers\UserController@deactivate');
Route::get('/request','App\Http\Controllers\UserController@xmlhttprequest');
Route::get('/explore','App\Http\Controllers\UserController@explore');
Route::post('/explore','App\Http\Controllers\UserController@exploreSearch');
Route::post('/updatePass','App\Http\Controllers\UserController@updatePass');
Route::get('/logOut','App\Http\Controllers\UserController@logOut');
Route::get('/Answer','App\Http\Controllers\UserController@Answer');
Route::get('/profile','App\Http\Controllers\ProfileController@loadMyProfile');

Route::get('/forgot','App\Http\Controllers\UserController@forgot');
Route::post('/forgot','App\Http\Controllers\UserController@emailCheck');
Route::get('/forgot2','App\Http\Controllers\UserController@forgot2');
Route::post('/forgot2','App\Http\Controllers\UserController@sendCode');
Route::get('/forgot3','App\Http\Controllers\UserController@forgot3');
Route::post('/forgot3','App\Http\Controllers\UserController@resetPass');


Route::post('/addPost','App\Http\Controllers\HomeController@addPost');
//Route::get('/loadPost','App\Http\Controllers\UserController@loadPost');
Route::get('/profileCheck/{userName}','App\Http\Controllers\ProfileController@showOtherProfile');
Route::get('/like/{postID}','App\Http\Controllers\HomeController@UpdateLike');
Route::post('/Answer/{questionID}','App\Http\Controllers\UserController@fillAnswer');
Route::post('/addQuestion/{userID}','App\Http\Controllers\ProfileController@addQ');
Route::get('/Answer/delete/{questionID}','App\Http\Controllers\UserController@delQs');
Route::post('/updateUser','App\Http\Controllers\UserController@updateUser');
Route::get('/settings','App\Http\Controllers\UserController@loadSettings');