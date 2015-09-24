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


		DB::table($input['table'])
			->where('id', $input['id'])
			->update( array(
				'name' 		 => $input['name'],
				'phone' 	 => $input['phone'],

				'address'  => $input['address'],
				'city' 	 	 => $input['city'],
				'state'  	 => $input['state'],
				'postal'   => $input['postal'],
				'country'  => $input['country'],

				'notes'  => $input['notes'],


				'lat' 		 => $input['lat'],
				'lng' 		 => $input['lng'],

				'category' => $input['category']
			));

			$data['id'] = $input['id'];
			$data['table'] = $input['table'];
			$data['brand'] = DB::table('brands')->where('dealer_table',$input['table'])->pluck('name');
			$data['dealers'] = DB::table($data['table'])->get();

			return View::make('dealers.show', array('data' => $data, 'title' => "Edit ". $data['brand']));

			return View::make('dealers.edit', array('data'=>$data));
	}

	public function export($table){
		$query = DB::table($table)->get();

		$output='';

		foreach($query as $dealer){
			$dealer = json_decode(json_encode($dealer), true);
			$dealer['name'] = str_replace(',', '', $dealer['name']);
			$output.=  implode(",", $dealer);
			$output.= "\n";
		}


		$headers = array(
      'Content-Type' => 'text/csv',
      'Content-Disposition' => 'attachment; filename=' .$table .".csv",
  	);

		return Response::make(rtrim($output, "\n"), 200, $headers);
	}

	public function deleteDealer($table, $id){
		DB::table($table)->where('id', $id)->delete();

		$data['id'] = $id;
		$data['table'] = $table;
		$data['brand'] = DB::table('brands')->where('dealer_table',$table)->pluck('name');
		$data['dealers'] = DB::table($table)->get();

		return View::make('dealers.show', array('data' => $data, 'title' => "Edit ". $data['brand']));

	}


}
