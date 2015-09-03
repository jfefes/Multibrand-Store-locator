<?php

class RepController extends BaseController {

	public function NYPAmap()
	{

		$query = DB::table('elite_arch')->where('state', 'NY')->orWhere('state', 'PA')->get();


		$locations = array();
		foreach($query as $location)
			array_push($locations, $location);

		$json = json_encode($locations);

    File::delete(public_path() . "/data/NY-PA-dealers.json");
    File::put(public_path() . "/data/NY-PA-dealers.json", $json);

		return View::make('reps.ny-pa');

	}


}
