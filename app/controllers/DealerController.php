<?php

class DealerController extends BaseController {

	public function show($id){
		View::make('dealers.edit');
	}

	public function update($table, $id){

		$data = DB::table($table)->where('id', $id)->get();
		$info['table'] = $table;
		$info['id'] = $id;

		return View::make('dealers.update', array('data'=>$data, 'info'=>$info));
	}

	public function doUpdate(){
		$input = Input::all();
		$input['table'] = Input::get('table');
		$input['id'] = Input::get('dealer_id');


		dd($input);

		//Get dealer name, associated table, and pull dealers from that table.
		$table_name = DB::table('brands')->where('id',$id)->pluck('dealer_table');
		$brand = DB::table('brands')->where('id',$id)->pluck('name');

		$validator = Validator::make(
		array(
			'name'		=> $input['name'],
			'phone'		=> $input['phone'],

			'address'	=> $input['address'],
			'city' 		=>	$input['city'],
			'state' 	=>	$input['state'],
			'postal' 	=>	$input['postal'],
			'country' =>	$input['country'],

			'lat'			=> $input['lat'],
			'lng'			=> $input['lng'],

		),
		array(
			'name'		=> 'required',
			'phone'		=> '',

			'address'	=> 'min:2',
			'city'		=> 'min:2',
			'state'		=> 'min:2',
			'postal'	=> 'min:2',
			'country'	=> 'min:2',

			'lat'			=> 'required',
			'lng'			=> 'required',

			)
		);

		$messages = $validator->messages();
    if(count($messages) > 0)
      return View::make("import", array('dealer' => $input, 'errors' => $messages->all()));


		DB::table($table_name)
			->where('id', $input['id'])
			->update( array(
				'name' 		 => $input['name'],
				'phone' 	 => $input['phone'],

				'address'  => $input['address'],
				'city' 	 	 => $input['city'],
				'state'  	 => $input['state'],
				'postal'   => $input['postal'],
				'country'  => $input['country'],

				'lat' 		 => $input['lat'],
				'lng' 		 => $input['lng']
			));

			$dealers = DB::table($table_name)->get();

			return View::make('dealers.edit');
	}


}
