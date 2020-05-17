<?php

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
    $videos=\App\Video::orderBy('created_at', 'desc')->paginate(12);;
    return view('welcome')->with('videos',$videos);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/video','VideoController');
Route::resource('/category','CategoryController');
Route::resource('/channel','ChannelsController');
Route::resource('/history','HistoryController');
Route::resource('/subscribtion','SubscribtionController');
