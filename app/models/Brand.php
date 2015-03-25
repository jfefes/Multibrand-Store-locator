<?php

class Brand extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'brands';

	protected $fillable = array('name', 'dealer_table');

	protected $guarded ='id';

	public $timestamps = false;


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}
