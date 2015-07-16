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
	 		Schema::table('slick_trick', function($table) {
	 			$table->string('notes');
	 			$table->string('email');
	 		});
	 	}

	 	/**
	 	 * Reverse the migrations.
	 	 *
	 	 * @return void
	 	 */

	 	public function down()
	 	{
	 		Schema::table('slick_trick', function($table) {
	       if(Schema::hasColumn('notes', 'slick_trick')) {
	         $table->dropColumn('notes');
	       }

	 			if(Schema::hasColumn('email', 'slick_trick')) {
	 				$table->dropColumn('email');
	 			}
	     });
	 	}

}
