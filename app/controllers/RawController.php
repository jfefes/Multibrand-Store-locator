<?php

class RawController extends BaseController {

	public function raw()
	{
		return View::make('raw.index');
	}

	public function export($table){
		$export = DB::table('raw')->get():

		foreach($export as $dealer){
			
			DB::table($table)
				->insert( array(
					'name' 		 => $dealer->name,
					'phone' 	 => $dealer->phone,

					'address'  => $dealer->address,
					'city' 	 	 => $dealer->city,
					'state'  	 => $dealer->state,
					'postal'   => $dealer->postal,
					'country'  => $dealer->country,

					'notes'  => $dealer->notes,

					'lat' 		 => $dealer->lat,
					'lng' 		 => $dealer->lng,

				));
		}

		return Redirect::to('/');
	}

}
