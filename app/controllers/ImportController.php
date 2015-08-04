<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImportController extends BaseController {

  public function index(){

    $data['brands'] = DB::table('brands')->get();

    return View::make('dealers.import', array('data' => $data, 'title' => 'Import from File'));
  }

  public function indexRaw(){

    return View::make('admin.raw');
  }

  public function getRaw(){

    $dealers=DB::table('raw')->get();

    return View::make('admin.view-raw', array('dealers' => $dealers));
  }


  public function import(){
    $input['category'] = false;
    $input = Input::all();

    $table = Input::get('brand');
    $file = Input::file('import');

    $name = time() . '-' . $file->getClientOriginalName();
    $storage = public_path();
    $path = $storage . '/uploads/';

    // Moves file to folder on server
    $file->move($path, $name);

    if($input['category']){
      $response = ( $this->_import_csv($path, $name, $table, $input['category']) ? 'OK' : 'No rows affected' );
    }
    else{
      $response = ( $this->_import_csv($path, $name, $table, false) ? 'OK' : 'No rows affected' );
    }


    //Importing 'completed' file

    File::Delete($path .$name);

    return $response;
  }


  public function importRaw(){
    $input['category'] = false;
    $input = Input::all();

    $table = Input::get('brand');
    $file = Input::file('import');

    $name = time() . '-' . $file->getClientOriginalName();
    $storage = public_path();
    $path = $storage . '/uploads/';

    // Moves file to folder on server
    $file->move($path, $name);

      $response = ( $this->_import_csv_raw($path, $name, 'raw', true) ? 'OK' : 'No rows affected' );


    //Importing 'completed' file

    File::Delete($path .$name);

    return Redirect::to('/dealers/get/raw');
  }


  private function _import_csv($path, $filename, $table, $category){

    $csv = $path . $filename;

    Schema::dropIfExists($table);


    if($category){

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
        $table->string('category');

        $table->text('notes');



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

        $table->text('notes');


  			$table->increments('id');
  		});
    }

    if($category){
      $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE " .$table ." FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`name`, `address`,`phone`, `email`, `city`, `state`, `postal`, `country`, `lat`, `lng`, `category`)", addslashes($csv));
    }else{
      $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE " .$table ." FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`name`, `address`,`phone`, `email`, `city`, `state`, `postal`, `country`, `lat`, `lng`, `category`)", addslashes($csv));
    }

    return DB::connection()->getpdo()->exec($query);
  }



  private function _import_csv_raw($path, $filename, $table){

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

      $table->text('notes');


      $table->string('lat');
      $table->string('lng');
      $table->string('category');


			$table->increments('id');
		});

    $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE " .$table ." FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`name`, `address`,`phone`, `email`, `city`, `state`, `postal`, `country`, `lat`, `lng`, `category`)", addslashes($csv));

    return DB::connection()->getpdo()->exec($query);
  }
}
