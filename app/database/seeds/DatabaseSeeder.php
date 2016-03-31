<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded');


        $this->call('SandboxSeeder');
        $this->command->info('Sandbox created');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
      $admin = new Role;
      $admin->name = 'Admin';
      $admin->save();

      $edit_all = new Permission();
      $edit_all->name = "edit_all";
      $edit_all->display_name = "Edit all";
      $edit_all->save();

      $admin->attachPermission($edit_all);
      $admin_user->attachRole($admin);
      */

      $admin_user = new User;
      $admin_user->username = 'admin';
      $admin_user->password = /* Set password */;
      $admin_user->save();


    }

}

class SandboxSeeder extends Seeder {

    public function run()
    {

      $path = public_path() . '/seeding/';

      $csv = $path . 'sandbox.csv';

      $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE sandbox FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`name`, `address`,`phone`, `email`, `lat`, `lng`, `category`)", addslashes($csv));
      DB::connection()->getpdo()->exec($query);

      Brand::create(array('name' => 'sandbox', 'dealer_table' => 'sandbox'));

    }
}
