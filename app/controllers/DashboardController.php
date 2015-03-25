<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$brands = DB::table('brands')->orderBy('name', 'asc')->get();


		//get all brands
		return View::make('dashboard', array('brands'=>$brands));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
		//Get dealer name, associated table, and pull dealers from that table.
		$table_name = DB::table('brands')->where('id',$id)->pluck('dealer_table');
		$brand = DB::table('brands')->where('id',$id)->pluck('name');
		$dealers = DB::table($table_name)->get();

		return View::make('dealers.show', array('id'=>$id, 'dealers'=>$dealers, 'brand_name'=>$brand));
	}

	public function save($id)
	{

		$input = Input::all();
		$input['id'] = Input::get('dealer_id');

		//Get dealer name, associated table, and pull dealers from that table.
		$table_name = DB::table('brands')->where('id',$id)->pluck('dealer_table');
		$brand = DB::table('brands')->where('id',$id)->pluck('name');

		$validator = Validator::make(
		array(
			'name'	=> $input['name'],
			'phone'	=> $input['phone'],

			'address'	=> $input['address'],
			'city' =>	$input['city'],
			'state' =>	$input['state'],
			'postal' =>	$input['postal'],
			'country' =>	$input['country'],

			'lat'	=> $input['lat'],
			'lng'	=> $input['lng'],

		),
		array(
			'name'	=> 'required',
			'phone'	=> '',

			'address'	=> 'min:2',
			'city'	=> 'min:2',
			'state'	=> 'min:2',
			'postal'	=> 'min:2',
			'country'	=> 'min:2',

			'lat'	=> 'required',
			'lng'	=> 'required',

			)
		);

		$messages = $validator->messages();
    if(count($messages) > 0)
      return View::make("import", array('dealer' => $input, 'errors' => $messages->all()));


		DB::table($table_name)
			->where('id', $input['id'])
			->update( array(
				'name' => $input['name'],
				'phone' => $input['phone'],

				'address'  => $input['address'],
				'city'  => $input['city'],
				'state'  => $input['state'],
				'postal'  => $input['postal'],
				'country'  => $input['country'],

				'lat' => $input['lat'],
				'lng' => $input['lng']
			));

			$dealers = DB::table($table_name)->get();


		return View::make('dealers.show', array('id'=>$id, 'dealers'=>$dealers, 'brand_name'=>$brand, 'status'=>'Dealer info has been edited.'));
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
