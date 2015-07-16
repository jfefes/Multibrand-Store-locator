<?php

class AdminController extends BaseController {

	public function index()
	{
		return View::make('admin.index');
	}

	public function getUsers(){
		$users = User::get();

		return View::make('admin.get-users', array('users'=>$users));
	}

}
