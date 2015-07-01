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

	Route::get('/', 'DashboardController@index');

	Route::get('/dashboard', 'DashboardController@index');

	Route::get('/dealers/import', 'ImportController@index');

	Route::get('/dealers/dashboard/{id}', function($id){
		return App::make('DashboardController')->show($id);
	});

	Route::get('/dealers/show/{id}', function($id){
		return App::make('DashboardController')->show($id);
	});

	Route::post('/dealers/show/{id}', function($id){
		return App::make('DashboardController')->save($id);
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

	Route::get('/admin', 'AdminController@index');

	Route::post('/admin', 'AdminController@create');


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
