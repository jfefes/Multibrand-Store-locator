<?php

class HomeController extends BaseController {

	public function index()
	{
		$brands = DB::table('brands')->orderBy('name', 'asc')->get();

		return View::make('home', array('brands'=>$brands));
	}

	public function report(){
		return View::make('report');
	}

}
