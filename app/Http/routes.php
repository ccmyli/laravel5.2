<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('event',['middleware' => ['web'], function () {
	//$user=auth()->user();
	//Event::fire('MyEvent');
	//event('App\Events\MyEvent',[new App\Events\MyEvent($user)]);
	//event(new App\Events\MyEvent($user));
    //return view('welcome');
}]);
Route::get('home','HomeController@index');
Route::get('welcome',function(){
	return view('welcome');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/','PostsController@index');

});

Route::resource('posts','PostsController');
Route::get('test',['middleware'=>['web','subscribe'],function(){
	$user=new App\User;
	dd($user->all());
	echo 'yse it is';
}]);
