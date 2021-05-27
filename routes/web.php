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
})->name('welcome');

Auth::routes();


//ROUTES PROTEGIDAS
Route::group(['middleware'=>'auth'],function(){
	Route::get('/home','RouteController@home')->name('home');
	Route::get('profile/{user}','RouteController@profile');
	Route::put('edit/first/user','RouteController@editFirstData')->name('editFirstData');
	Route::put('already','RouteController@already')->name('already');

	//BOOKS
	Route::get('book/show/{id}','BookController@showBook')->name('showBookUser');
	Route::get('saga/show/{name}','BookController@showSaga')->name('showSagaUser');

	//USERS 
	Route::get('user/show/{id}','UserController@showUser')->name('showUserUser');
	Route::get('show/form/edit/user','UserController@showFormEdit')->name('showFormEditUser');
	Route::put('edit/data/user','UserController@editDataUser')->name('editDataUser');
	Route::put('edit/image/user','UserController@editImage')->name('editImageUser');

	//AUTHORS
	Route::get('author/show/{id}','AuthorController@showAuthor')->name('showAuthorUser');

	//SEARCH
	Route::get('/search/books/profiles/autocomplete','SearchController@searchBookProfileAutocomplete')->name('searchBookProfileAutocomplete');
	Route::get('search/books/profiles','SearchController@searchBookProfile')->name('searchBookProfile');
	Route::get('search/genres/{genre}','SearchController@searchGenres')->name('searchGenresUser');
	Route::get('search/with/filters','SearchController@searchWithFilters')->name('searchWithFilters');
	
	//REVIEWS
	Route::post('review/store','ReviewController@storeReview')->name('storeReviewUser');

	//POSTS
	Route::post('store/post/{id}','PostController@storePost')->name('storePostUser');
	Route::post('comment/post/{id}','PostController@commentPost')->name('commentPost');
	Route::get('show/post/{id}','PostController@showPost')->name('showPostUser');
	Route::get('show/post/notification/{id}','PostController@showPostNotification')->name('showPostUserNotification');
	//SHOW COMMENTS
	Route::get('show/comments','PostController@showComments')->name('showCommentsUser');
	//LIKE AND DISLIKE
	Route::get('like/post/','PostController@likePost')->name('likePostUser');
	Route::get('dislike/post/','PostController@dislikePost')->name('dislikePostUser');

	//PROFILE
	Route::get('/show/profile/','ProfileController@showProfile')->name('showProfile');

	//LIBRARY
	Route::post('/store/library','LibraryController@storeItemLibrary')->name('storeItemLibraryUser');
	Route::get('show/library/favorites/{id}','LibraryController@showLibraryFavorite')->name('showLibraryFavorite');
	Route::get('show/library/reading/{id}','LibraryController@showLibraryReading')->name('showLibraryReading');
	Route::get('show/library/read/{id}','LibraryController@showLibraryRead')->name('showLibraryRead');

	//RELATIONS
	Route::post('follow/','RelationController@followUser')->name('followUser');
	Route::post('add/friend/{id}','RelationController@addFriend')->name('addFriendUser');
	Route::post('allow/process/friend','RelationController@allowFriend')->name('allowFriend');
	Route::delete('delete/process/friend','RelationController@declineFriend')->name('declineFriend');
	Route::get('show/relation/friends/{id}','RelationController@showRelationFriend')->name('showRelationFriend');
	Route::get('show/relation/followers/{id}','RelationController@showRelationFollower')->name('showRelationFollower');
	Route::get('show/relation/follows/{id}','RelationController@showRelationFollow')->name('showRelationFollow');


	//NOTIFICATIONS
	Route::get('show/notifications','NotificationController@showNotifications')->name('showNotificationUser');

	Route::get('get/genres','GenreController@getGenres')->name('getGenres');

	//TEST
	Route::post('test','TestController@test')->name('test');



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

	//GENRES
	Route::get('admin/genres','AdminGenreController@homeGenres');
	Route::get('admin/genres/insert','AdminGenreController@insetGenre')->name('insertGenre');
	Route::post('admin/genres/store','AdminGenreController@storeGenre')->name('storeGenre');
	Route::get('admin/genres/show/{id}','AdminGenreController@showGenre')->name('showGenre');
	Route::put('admin/genres/edit/{id}','AdminGenreController@editGenre')->name('editGenre');

	//SEARCH
	Route::get('admin/users/search/users','AdminSearchController@searchAutocompleteUsers')->name('searchUsers');
	Route::get('admin/books/search/books/','AdminSearchController@searchAutocompleteBooks')->name('searchBook');
	Route::get('admin/authors/search/authors','AdminSearchController@searchAutocompleteAuthors')->name('searchAuthor');
	Route::get('admin/books/search/id/authors','AdminSearchController@searchAutocompleteIdAuthors')->name('searchIdAuthor');
	Route::get('admin/genres/search/genres','AdminSearchController@searchAutocompleteGenres')->name('searchGenres');
	

});
