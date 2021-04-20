<?php

use App\User;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();


//ROUTES PROTEGIDAS
Route::group(['middleware'=>'auth'],function(){
	Route::get('/home','RouteController@home');
	Route::get('profile/{user}','RouteController@profile');

	//BOOKS
	Route::get('book/show/{id}','BookController@showBook')->name('showBookUser');

	//USERS 
	Route::get('user/show/{id}','UserController@showUser')->name('showUserUser');

	//AUTHORS
	Route::get('author/show/{id}','AuthorController@showAuthor')->name('showAuthorUser');

	//SEARCH
	Route::get('/search/books/profiles/autocomplete','SearchController@searchBookProfileAutocomplete')->name('searchBookProfileAutocomplete');
	Route::get('search/books/profiles','SearchController@searchBookProfile')->name('searchBookProfile');
});


//ROUTES ADMIN SUPERSUPROTECTED
Route::group(['middleware'=>'auth'],function(){
	Route::get('admin/home','AdminRouteController@homeAdmin');

	//USERS

	Route::get('admin/users','AdminRouteController@homeUsers');
	Route::delete('admin/users/delete/{id}','AdminUserController@deleteUser')->name('deleteUser');

	//BOOKS
	Route::get('admin/books','AdminRouteController@homeBooks');
	Route::get('admin/books/insert','AdminRouteController@insertBook')->name('insertBook');
	Route::post('admin/books/store','AdminBookController@store')->name('storeBook');
	Route::get('admin/books/show/{id}','AdminBookController@showBook');
	Route::put('admin/books/edit/{id}','AdminBookController@editBook')->name('editBook');
	//AUTHORS

	Route::get('admin/authors','AdminAuthorController@homeAuthors');
	Route::get('admin/authors/insert','AdminAuthorController@insertAuthor')->name('insertAuthor');
	Route::post('admin/authors/store','AdminAuthorController@storeAuthor')->name('storeAuthor');
	Route::get('admin/authors/show/{id}','AdminAuthorController@showAuthor')->name('showAuthor');
	Route::put("admin/authors/edit/{id}","AdminAuthorController@editAuthor")->name("editAuthor");

	//SEARCH
	Route::get('admin/users/search/users','AdminSearchController@searchAutocompleteUsers')->name('searchUsers');
	Route::get('admin/books/search/books/','AdminSearchController@searchAutocompleteBooks')->name('searchBook');
	Route::get('admin/authors/search/authors','AdminSearchController@searchAutocompleteAuthors')->name('searchAuthor');
	Route::get('admin/books/search/id/authors','AdminSearchController@searchAutocompleteIdAuthors')->name('searchIdAuthor');
	
});
