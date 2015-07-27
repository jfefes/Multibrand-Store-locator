<?php

class ReportController extends BaseController {

	public function EliteInternational()
	{

		$dealers = DB::table('elite_arch')->whereNotIn('country', ['USA'])->orderBy('country', 'asc')->get();

		return View::make('reports.elite-international', array('dealers'=> $dealers));
	}


}
