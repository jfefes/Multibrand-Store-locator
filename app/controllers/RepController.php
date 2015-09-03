<?php

class RepController extends BaseController {

	public function newMap(){
		$brands = DB::table('brands')->orderBy('name', 'asc')->get();

		return View::make('reps.form-new', array('brands'=>$brands));
	}

	public function generateMap(){
		$input = Input::get();

		$brands = $input['brand'];
		$states = $input['location'];

		$locations = array();
		$query = array();


		foreach ($brands as $brand) {
			$query = DB::table($brand)->whereIn('state', $states)->get();

			foreach($query as $location)
				array_push($locations, $location);
		}

		$json = json_encode($locations);

		File::delete(public_path() . "/data/results.json");
		File::put(public_path() . "/data/results.json", $json);

		return View::make('reps.map');
	}

	public function NYPAmap()
	{

		$array = array("NY", "PA");

		$brands = array("duel", "duel");

		$query = DB::table('elite_arch')->whereIn('state', $array)->get();

		$locations = array();
		foreach($query as $location)
			array_push($locations, $location);

		$json = json_encode($locations);

    File::delete(public_path() . "/data/NY-PA-dealers.json");
    File::put(public_path() . "/data/NY-PA-dealers.json", $json);

		return View::make('reps.ny-pa');

	}


}
