<?php

class RawController extends BaseController {

	public function index()
	{

		$brands = DB::table('brands')->get();


		return View::make('raw.index', array('brands' => $brands));
	}

	public function export(){
		$export = DB::table('raw')->get();

		$input = Input::all();

		foreach($export as $dealer){

			DB::table($input['brand'])
				->insert( array(
					'name' 		 => $dealer->name,
					'phone' 	 => $dealer->phone,

					'address'  => $dealer->address,
					'city' 	 	 => $dealer->city,
					'state'  	 => $dealer->state,
					'postal'   => $dealer->postal,
					'country'  => $dealer->country,


					'lat' 		 => $dealer->lat,
					'lng' 		 => $dealer->lng,
					'category' => $dealer->category,

				));
		}

		return Redirect::to('/');
	}

}
