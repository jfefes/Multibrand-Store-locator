<?php

class MapController extends BaseController {

	public function index($table)
	{
		$query = DB::table($table)->get();

		$locations = array();
		foreach($query as $location)
			array_push($locations, $location);

			$json = json_encode($locations);

      File::delete(public_path() . "/data/" .$table .".json");
      File::put(public_path() . "/data/" .$table .".json", $json);

			return View::make('dealers.map', array('table'=>$table));
	}

}
