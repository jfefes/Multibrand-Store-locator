<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sandbox extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sandbox', function(Blueprint $table)
		{
			$table->string('name');
			$table->string('phone');
			$table->string('email');

			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('postal');
			$table->string('country');

			$table->string('lat');
			$table->string('lng');
			$table->string('category');


			$table->increments('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sandbox');

	}

}
