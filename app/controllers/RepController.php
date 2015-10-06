<?php

class RepController extends BaseController {

	public function index(){
		return View::make('reps.index');
	}

	public function newMap(){
		$brands = DB::table('brands')->orderBy('name', 'asc')->get();

		return View::make('reps.form-new', array('brands'=>$brands));
	}

	public function generateMap(){
		$input = Input::get();

		$brands = $input['brand'];
		$states = array();

		foreach (explode(', ', $input['location']) as $location){
			array_push($states, $location);
		}

		$locations = array();
		$query = array();

		if ($brands!=""){
			foreach ($brands as $brand) {
				$query = DB::table($brand)->whereIn('state', $states)->get();
			}
		}
		else {
			foreach ($brands as $brand) {
				$query = DB::table($brand)->get();
			}
		}

		foreach($query as $location){
			array_push($locations, $location);
			}

		$json = json_encode($locations);

		File::delete(public_path() . "/data/results.json");
		File::put(public_path() . "/data/results.json", $json);

		return View::make('reps.map');
	}

	public function ChuckKMap()
	{

		$array = array("NY", "VT", "ME", "MA", "NH", "RI", "CT");

		$query = DB::table('elite_arch')->whereIn('state', $array)->get();

		$locations = array();
		foreach($query as $location)
			array_push($locations, $location);

		$json = json_encode($locations);

    File::delete(public_path() . "/data/Chuck-K-dealers.json");
    File::put(public_path() . "/data/Chuck-K-dealers.json", $json);

		return View::make('reps.ny-pa');

	}


}
