<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImportController extends BaseController {

  public function index(){

    $data['brands'] = DB::table('brands')->get();

    return View::make('dealers.import', array('data' => $data, 'title' => 'Import from File'));
  }


  public function import(){
    $input = Input::all();

    $table = Input::get('brand');
    $file = Input::file('import');

    $name = time() . '-' . $file->getClientOriginalName();
    $storage = public_path();
    $path = $storage . '/uploads/';

    // Moves file to folder on server
    $file->move($path, $name);

    //Importing 'completed' file
    $response = ( $this->_import_csv($path, $name, $table) ? 'OK' : 'No rows affected' );

    File::Delete($path .$name);

    return $response;
  }


  private function _import_csv($path, $filename, $table){

    $csv = $path . $filename;

    Schema::dropIfExists($table);

    Schema::create($table, function(Blueprint $table)
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

			$table->increments('id');
		});

    //ofcourse you have to modify that with proper table and field names
    $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE " .$table ." FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`name`, `address`,`phone`, `email`, `lat`, `lng`)", addslashes($csv));

    return DB::connection()->getpdo()->exec($query);
  }
}
