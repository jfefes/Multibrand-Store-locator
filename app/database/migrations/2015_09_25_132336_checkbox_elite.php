<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotesEmail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 public function up()
	 	{
	 		Schema::table('elite', function($table) {
	 			$table->boolean('show');
	 		});
	 	}

	 	/**
	 	 * Reverse the migrations.
	 	 *
	 	 * @return void
	 	 */

	 	public function down()
	 	{
	 		Schema::table('elite', function($table) {
	       if(Schema::hasColumn('show', 'elite')) {
	         $table->dropColumn('show');
	       }
	     });
	 	}

}
