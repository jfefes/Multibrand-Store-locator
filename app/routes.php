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

Route::get('/logout', array('before' => 'auth', function() {
	return App::make('LoginController')->doLogout();
}));

Route::get('/', 'DashboardController@index');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/dealers/import', 'ImportController@index');

Route::get('/dealers/dashboard/{id}', function($id){
	return App::make('DashboardController')->show($id);
});


Route::group(array('before' => 'auth'), function()
{
	Route::get('/dealers/show/{id}', function($id){
		return App::make('DashboardController')->edit($id);
	});

	Route::post('/dealers/show/{id}', function($id){
		return App::make('DashboardController')->save($id);
	});

	Route::get('/dealers/edit/{id}', function($id){
		return App::make('DealerController')->show($id);
	});

	Route::post('/dealers/edit/{id}', function($id){
		return App::make('DealerController')->update($id);
	});

	Route::post('/dealers/import', 'ImportController@import');

	Route::post('/dealers/delete', 'DealerController@delete');

	Route::get('/brands/add', 'BrandController@index');

	Route::post('/brands/add', 'BrandController@create');
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
