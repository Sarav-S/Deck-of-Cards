<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('decks-compare/{deckone?}/{decktwo?}', 'CommonController@getCompareDecks');
Route::get('decks-comparison', 'CommonController@postCompareDecks');
Route::get('all-decks', 'CommonController@getAllDecks');
Route::get('all-decks/{id}', 'CommonController@getDecksById');
Route::get('user/{id}', 'CommonController@getUserDecks');

Route::group(['middleware' => 'auth'], function(){

	Route::get('like-deck/{id}', 'UserController@likeDeck');

	Route::group(['middleware' => 'admin'], function(){

		Route::resource('users', 'UserController', [
			'names' => [
				'index'   => 'user-index',
				'create'  => 'user-create',
				'store'   => 'user-save',
				'edit'    => 'user-edit',
				'update'  => 'user-update',
				'destroy' => 'user-delete'
			]
		]);

		Route::resource('categories', 'CategoryController');
		Route::resource('cards', 'CardController');
		Route::resource('decks', 'DeckController');
	});

	Route::group(['middleware' => 'user'], function(){
		Route::resource('my-decks', 'UserDeckController');
	});
});

Route::get('/home', 'HomeController@index');
