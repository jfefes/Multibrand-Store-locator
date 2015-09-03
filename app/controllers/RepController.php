<?php

class RepController extends BaseController {

	public function NYPAmap()
	{

		$array = array("NY", "PA");

		$brands = array("duel", "duel");
/*
		foreach ($input["brands"] as $brand) {
			$test = DB::table($brand)->whereIn('state', $input[""])->get();
		}*/

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
