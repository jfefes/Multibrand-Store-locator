<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/login', array('before' => array('force.ssl'), function() {
	return App::make('LoginController')->index();
}));

Route::post('/login', array('before' => array('csrf', 'force.ssl'), function() {
	return App::make('LoginController')->doLogin();
}));



Route::group(array('before' => 'auth'), function()
{

	Route::get('/logout', array('before' => 'auth', function() {
		return App::make('LoginController')->doLogout();
	}));

	Route::get('', 'HomeController@index');

	Route::get('/', 'HomeController@index');

	Route::get('/report', 'HomeController@report');

	Route::get('/reports/elite-international', 'ReportController@EliteInternational');

	Route::get('/settings', 'UserController@settings');

	Route::post('/admin/user/create', 'UserController@create');



	Route::get('/dashboard', 'DashboardController@index');

	Route::get('/dealers/import', 'ImportController@index');

	Route::get('/dealers/import/raw', 'ImportController@indexRaw');

	Route::get('/dealers/get/raw', 'ImportController@getRaw');



	Route::get('/raw/export', 'RawController@index');

	Route::post('/raw/export', 'RawController@export');



	Route::get('/dealers/dashboard/{id}', function($id){
		return App::make('DashboardController')->show($id);
	});

	Route::get('/dealers/show/{id}', function($id){
		return App::make('DashboardController')->show($id);
	});

	Route::post('/dealers/show/{id}', function($id){
		return App::make('DashboardController')->getAll($id);
	});

	Route::get('/dealers/edit/{id}', function($id){
		return App::make('DashboardController')->edit($id);
	});

	Route::post('/dealers/edit/{id}', function($id){
		return App::make('DealerController')->show($id);
	});

	Route::get('/dealers/update/{table}/{id}', function($table,$id){
		return App::make('DealerController')->update($table,$id);
	});

	Route::post('/dealers/update', function(){
		return App::make('DealerController')->doUpdate();
	});

	Route::post('/dealers/add', function(){
		return App::make('DashboardController')->create();
	});

	Route::post('/dealers/import', 'ImportController@import');

	Route::post('/dealers/import/raw', 'ImportController@importRaw');

	Route::post('/dealers/delete', 'DealerController@delete');

	Route::get('/brands/add', 'BrandController@index');

	Route::post('/brands/add', 'BrandController@create');

	Route::get('/dealers/csv/{table}', function($table){
		return App::make('DealerController')->export($table);
	});

	Route::get('/dealers/map/{table}', function($table){
		return App::make('MapController')->index($table);
	});

	Route::get('/dealers/delete/{table}/{id}', function($table, $id){
		return App::make('DealerController')->deleteDealer($table, $id);
	});

	Route::get('/dealers/search/{table}', function($table){
		return App::make('SearchController')->index($table);
	});

	Route::post('/dealers/search', 'SearchController@search');

	Route::get('/warranty', 'WarrantyController@index');

	Route::post('/warranty', 'WarrantyController@create');



	Route::get('/adminpanel', 'AdminController@index');

	Route::get('/users/manage', 'AdminController@getUsers');


	Route::get('/users/get{username}', function($username){
		return App::make('UserController')->getUser($username);
	});

});

Route::any('/dealers/get', function()
{
	if (Request::isMethod('post')) {
		$data = $_POST['dealer'];
	}
	else{
		$data = $_GET['dealer'];

	}
	$query = DB::table($data)->get();

	$locations = array();
	foreach($query as $location)
		array_push($locations, $location);

	return Response::json($locations);
});

Route::any('/users/get', function()
{
	if (Request::isMethod('post')) {
		$data = $_POST['email'];
	}
	else{
		$data = $_GET['email'];

	}
	return App::make('UserController')->getUser($data);
});

Route::post('/users/setpassword', 'UserController@setpassword');
