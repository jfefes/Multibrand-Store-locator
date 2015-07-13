<?php

class WarrantyController extends BaseController {

	public function index()
	{
		return View::make('warranty');
	}

	public function create()
	{
		$input = Input::get();

		$query = new EliteEntry();
		$query->name = $input['name'];
		$query->phone = $input['phone'];
		$query->address = $input['address'];
		$query->city = $input['city'];
		$query->state = $input['state'];
		$query->zip = $input['postal'];
		$query->lat = $input['lat'];
		$query->lon = $input['lng'];
		$query->save();


		return View::make('warranty', array('status' => 'Dealer added!'));
	}

}
