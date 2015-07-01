<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Zizaco\Entrust\HasRole;

class EliteEntry extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, HasRole;

	protected $connection = "eliteDB";

	protected $table = "stores";

	protected $fillable = array('name', 'telephone', 'email', 'latitude', 'longitude');

	protected $guard = array('id');

}
