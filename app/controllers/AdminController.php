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
		$query->phone = $input['phone'];
		$query->address = $input['address'];
		$query->city = $input['city'];
		$query->state = $input['state'];
		$query->zip = $input['postal'];
		$query->lat = $input['lat'];
		$query->lng = $input['lng'];
		$query->save();


		return View::make('admin.index', array('$message' => 'Sent!'));
	}

}
