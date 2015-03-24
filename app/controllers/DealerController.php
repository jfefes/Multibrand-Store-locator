<?php

class DealerController extends BaseController {

	public function import(){
		$query = DB::table('raw')->first();

		return View::make('import', array('dealer'=>$query));
	}

	public function add(){
		$input = Input::all();


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


		DB::table('slick_trick')
			->insert( array(
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

		DB::table('raw')->where('name', $input['name'])->delete();

		$query = DB::table('raw')->first();


		return View::make('import', array('message'=>"Dealer location has been added", 'dealer'=>$query));
	}

	public function get(){
		$query = DB::table('slick_trick')->get();

		$locations = array();
		foreach($query as $location)
			array_push($locations, $location);

		return Response::json($locations);
	}

	public function delete(){
		$input = Input::all();

		DB::table('raw')->where('name', $input['name'])->delete();

		$query = DB::table('raw')->first();

		return DealerController::import();
	}

}
