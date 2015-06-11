<?php

use Illuminate\Database\Schema\Blueprint;

class BrandController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('brands.add');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$input = Input::all();

		Brand::create(array('name' => $input['name'], 'dealer_table' => $input['table']));

		Schema::create($input['table'], function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('name')->unique();
      $table->string('phone');

			$table->string('address');
			$table->string('address2');
			$table->string('city');
			$table->string('state');
			$table->string('postal');
      $table->string('country');

			$table->string('category');

			$table->string('lat');
			$table->string('lng');
		});

		return View::make('brands.add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
