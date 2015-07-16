<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Zizaco\Entrust\HasRole;

class EliteEntry extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $connection = "eliteDB";

	protected $table = "elite_dealers";

	protected $fillable = array('name', 'phone', 'email', 'address', 'city', 'state', 'zip', 'lat', 'lon');

	public $timestamps = false;

	protected $guard = array('id');

}
