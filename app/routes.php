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


Route::group(array('before' => 'auth'), function()
{

	Route::get('/', 'DashboardController@index');

	Route::get('/dashboard', 'DashboardController@index');

  Route::get('/dealers/import', 'DealerController@import');

	Route::post('/dealers/show/{id}', function($id){
		return App::make('DashboardController')->show($id);
	});

  Route::post('/dealers/import', 'DealerController@add');

  Route::post('/dealers/delete', 'DealerController@delete');

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
