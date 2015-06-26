<?php

class SearchController extends BaseController {

	public function index($table)
	{
		return View::make('search.index', array('brand'=> $table));
	}

	public function search(){
		$input = Input::get();


		$result = DB::table($input['table'])->where($input['term'], 'like', '%' .$input['key'] .'%')->get();

		return View::make('search.results', array('results'=> $result, 'key'=>$input['key'], 'table'=>$input['table']));
	}

}
