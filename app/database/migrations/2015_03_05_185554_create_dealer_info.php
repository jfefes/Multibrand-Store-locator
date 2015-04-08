<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerInfo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slick_trick', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('name')->unique();
      $table->string('phone');

			$table->string('address');
			$table->string('address2');
			$table->string('city');
			$table->string('state');
			$table->string('postal');
      $table->string('country');

			$table->string('lat');
			$table->string('lng');

			$table->primary(array('lat', 'lng'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('slick_trick');

	}

}
