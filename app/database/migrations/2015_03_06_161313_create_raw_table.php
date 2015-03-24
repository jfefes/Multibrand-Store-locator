<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('raw', function(Blueprint $table)
		{
      $table->string('name');
      $table->string('phone');

			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('postal');
      $table->string('country');

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
		Schema::dropIfExists('raw');

	}

}
