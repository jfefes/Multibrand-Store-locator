<?php

class DealerController extends BaseController {

	public function add(){
		$input = Input::all();


		$validator = Validator::make(
		array(
			'name'	=> $input['name'],
			'phone'	=> $input['phone'],

			'address'	=> $input['address'],

			'lat'	=> $input['lat'],
			'lng'	=> $input['lng'],

		),
		array(
			'name'	=> 'required',
			'phone'	=> '',

			'address'	=> 'required',

			'lat'	=> 'required',
			'lng'	=> 'required',

			)
		);

		$messages = $validator->messages();
    if(count($messages) > 0)
      return View::make("geocode", array('input' => $input, 'errors' => $messages->all()));


		DB::table('slick_trick')
			->insert( array(
				'name' => $input['name'],
				'address'  => $input['address'],
				'phone' => $input['phone'],
				'lat' => $input['lat'],
				'lng' => $input['lng']
			));

		return View::make('geocode', array('message'=>"Dealer location has been added"));
	}

	public function get(){
		$query = DB::table('slick_trick')->get();

		$locations = array();
		foreach($query as $location)
			array_push($locations, $location);

		return Response::json($locations);
	}

}
