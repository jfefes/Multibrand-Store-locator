<?php

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
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create(
            array(
                'username' => 'admin',
                'password' => '$2y$10$eM7BjyigeH2UJnRfRu8j1eVj3Gs87yv7CxMzCst5K1iLl5R5lC016', # hunt4food
            )
        );
    }

}
