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

		if ($input['location']!=null){
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


}
