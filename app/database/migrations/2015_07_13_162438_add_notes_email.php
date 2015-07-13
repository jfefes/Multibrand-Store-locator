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
	       if(Schema::hasColumn('notes', 'sheets')) {
	         $table->dropColumn('notes');
	       }

	 			if(Schema::hasColumn('email', 'sheets')) {
	 				$table->dropColumn('email');
	 			}
	     });
	 	}

}
