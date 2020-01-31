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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'newPageController@loggedin')->name('newPage'); //shows profile page

Route::get('/tweets', 'newPageController@show'); // shows all tweets

Route::get('/create', 'tweetFormController@showForm'); //create tweet

//Route::get('/newtweet/validate', 'tweetFormController@checkForm');

Route::post('validatetweet', 'tweetFormController@checkWithController'); // validate and store tweet

Route::post('/delete', 'tweetFormController@delete'); //delete a tweet

Route::post('/update', 'tweetFormController@update'); // update a tweet

Route::post('/view', 'tweetFormController@viewTweet');

Route::post('/edit', 'tweetFormController@editTweet');

