<?php

class AdminController extends BaseController {

	public function index()
	{
		return View::make('admin.index');
	}

	public function create()
	{
		$input = Input::get();

		$query = new EliteEntry();
		$query->name = $input['name'];
		$query->telephone = $input['phone'];
		$query->address = $input['address'] ." " .$input['city'] ." " .$input['state']." " .$input['postal'];
		$query->latitude = $input['lat'];
		$query->longitude = $input['lng'];
		$query->save();


		return View::make('admin.index', array('$message' => 'Sent!'));
	}

}
