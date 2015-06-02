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

    if($input['level']){
      $response = ( $this->_import_csv($path, $name, $table, $input['level']) ? 'OK' : 'No rows affected' );
    }
    else{
      $response = ( $this->_import_csv($path, $name, $table, false) ? 'OK' : 'No rows affected' );
    }


    //Importing 'completed' file

    File::Delete($path .$name);

    return $response;
  }


  private function _import_csv($path, $filename, $table, $levels){

    $csv = $path . $filename;

    Schema::dropIfExists($table);


    if($levels){

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
        $table->string('level');


  			$table->increments('id');
  		});
    }

    else{

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

        if($levels){

          $table->string('lng');
        }

  			$table->increments('id');
  		});
    }

    //ofcourse you have to modify that with proper table and field names
    if($levels){
      $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE " .$table ." FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`name`, `address`,`phone`, `email`, `lat`, `lng`, `level`)", addslashes($csv));
    }else{
      $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE " .$table ." FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`name`, `address`,`phone`, `email`, `lat`, `lng`)", addslashes($csv));
    }

    return DB::connection()->getpdo()->exec($query);
  }
}
