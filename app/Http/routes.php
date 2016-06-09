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

/*Login by account*/
Route::get('/auth/login', array('as'=>'auth.login', 'uses'=>'AuthController@getLogin'));
Route::post('/auth/login','AuthController@postLogin');

/*Login - Register by Facebook*/
Route::get('/auth/facebook', array('as'=>'auth.facebook', 'uses'=>'AuthController@getLoginByFacebook'));
Route::get('/auth/facebook/callback', array('as'=>'auth.facebook.callback', 'uses'=>'AuthController@getFacebookCallback'));

/*Login - Register by TWitter*/
Route::get('/auth/twitter', array('as'=>'auth.twitter', 'uses'=>'AuthController@getLoginByTWitter'));
Route::get('/auth/twitter/callback', array('as'=>'auth.twitter.callback', 'uses'=>'AuthController@getTwitterCallback'));

/*Logout*/
Route::get('/auth/logout', array('as'=>'auth.logout', 'uses'=>'AuthController@getLogout'));

Route::get('/', array('as'=>'question', 'uses'=>'QuestionController@getIndex'));
Route::get('/question/category/{level_id}', array('as'=>'question.category', 'uses'=>'QuestionController@getCategory'));
Route::get('/question/exercise/{category_id}', array('as'=>'question.exercise', 'uses'=>'QuestionController@getExercise'));
Route::post('/question/exercise/awnser', 'QuestionController@postAwnser');


/*Admins*/
Route::group(array('namespace' => 'Admin'), function () {
	Route::get('/admin/login', array('as'=>'admin.login', 'uses'=>'UserController@getLogin'));
	Route::post('/admin/login', 'UserController@postLogin');
	Route::get('/admin/logout', array('as'=>'admin.logout', 'uses'=>'UserController@getLogout'));

	Route::group(array('middleware' => 'auth'), function () {
		Route::get('/admin/dashboard', array('as'=>'admin.dashboard', 'uses'=>'DashboardController@getIndex'));

		/*Groups*/
		Route::get('/admin/groups', array('as'=>'admin.groups', 'uses'=>'GroupController@getIndex'));
		Route::get('/admin/group/create', array('as'=>'admin.group.create', 'uses'=>'GroupController@getCreate'));
		Route::post('/admin/group/create', 'GroupController@postCreate');
		Route::get('/admin/group/edit/{id}', array('as'=>'admin.group.edit', 'uses'=>'GroupController@getEdit'));
		Route::post('/admin/group/edit/{id}', 'GroupController@postEdit');
		Route::get('/admin/group/detail/{id}', array('as'=>'admin.group.detail', 'uses'=>'GroupController@getDetail'));
		Route::post('/admin/group/delete/{id}', 'GroupController@postDelete');
		Route::get('/admin/group/delete/{id}', array('as'=>'admin.group.delete', 'uses'=>'GroupController@getDelete'));
		Route::post('/admin/group/delete-all', 'GroupController@postDeleteAll');
		Route::post('/admin/group/change-status/{id}', 'GroupController@postChangeStatus');

		/*Users*/
		Route::get('/admin/users', array('as'=>'admin.users', 'uses'=>'UserController@getIndex'));
		Route::get('/admin/user/create', array('as'=>'admin.user.create', 'uses'=>'UserController@getCreate'));
		Route::post('/admin/user/create', 'UserController@postCreate');
		Route::get('/admin/user/edit/{id}', array('as'=>'admin.user.edit', 'uses'=>'UserController@getEdit'));
		Route::post('/admin/user/edit/{id}', 'UserController@postEdit');
		Route::get('/admin/user/detail/{id}', array('as'=>'admin.user.detail', 'uses'=>'UserController@getDetail'));
		Route::post('/admin/user/delete/{id}', 'UserController@postDelete');
		Route::get('/admin/user/delete/{id}', array('as'=>'admin.user.delete', 'uses'=>'UserController@getDelete'));
		Route::post('/admin/user/delete-all', 'UserController@postDeleteAll');
		Route::post('/admin/user/change-status/{id}', 'UserController@postChangeStatus');

		/*Categories*/
		Route::get('/admin/categories', array('as'=>'admin.categories', 'uses'=>'CategoryController@getIndex'));
		Route::get('/admin/category/create', array('as'=>'admin.category.create', 'uses'=>'CategoryController@getCreate'));
		Route::post('/admin/category/create', 'CategoryController@postCreate');
		Route::get('/admin/category/edit/{id}', array('as'=>'admin.category.edit', 'uses'=>'CategoryController@getEdit'));
		Route::post('/admin/category/edit/{id}', 'CategoryController@postEdit');
		Route::get('/admin/category/detail/{id}', array('as'=>'admin.category.detail', 'uses'=>'CategoryController@getDetail'));
		Route::post('/admin/category/delete/{id}', 'CategoryController@postDelete');
		Route::get('/admin/category/delete/{id}', array('as'=>'admin.category.delete', 'uses'=>'CategoryController@getDelete'));
		Route::post('/admin/category/delete-all', 'CategoryController@postDeleteAll');
		Route::post('/admin/category/change-status/{id}', 'CategoryController@postChangeStatus');

		/*Questions*/
		Route::get('/admin/questions', array('as'=>'admin.questions', 'uses'=>'QuestionController@getIndex'));
		Route::get('/admin/question/create', array('as'=>'admin.question.create', 'uses'=>'QuestionController@getCreate'));
		Route::post('/admin/question/create', 'QuestionController@postCreate');
		Route::get('/admin/question/edit/{id}', array('as'=>'admin.question.edit', 'uses'=>'QuestionController@getEdit'));
		Route::post('/admin/question/edit/{id}', 'QuestionController@postEdit');
		Route::get('/admin/question/detail/{id}', array('as'=>'admin.question.detail', 'uses'=>'QuestionController@getDetail'));
		Route::post('/admin/question/delete/{id}', 'QuestionController@postDelete');
		Route::get('/admin/question/delete/{id}', array('as'=>'admin.question.delete', 'uses'=>'QuestionController@getDelete'));
		Route::post('/admin/question/delete-all', 'QuestionController@postDeleteAll');
		Route::post('/admin/question/change-status/{id}', 'QuestionController@postChangeStatus');

		/*Results*/
		Route::get('/admin/results', array('as'=>'admin.results', 'uses'=>'ResultController@getIndex'));		
		Route::get('/admin/result/detail/{id}', array('as'=>'admin.result.detail', 'uses'=>'ResultController@getDetail'));
		Route::post('/admin/result/delete/{id}', 'ResultController@postDelete');
		Route::get('/admin/result/delete/{id}', array('as'=>'admin.result.delete', 'uses'=>'ResultController@getDelete'));
		Route::post('/admin/result/delete-all', 'ResultController@postDeleteAll');
	});
});