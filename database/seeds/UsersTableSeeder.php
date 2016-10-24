<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'email' => 'admin@blogger.com',
        'password' => bcrypt('password'),
        'first_name' => 'John',
        'last_name' => 'Doe',
        'display_name' => 'John Doe',
      ]);

      DB::table('users')->insert([
        'email' => 'editor@blogger.com',
        'password' => bcrypt('password'),
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'display_name' => 'Jane Doe',
      ]);

      DB::table('users')->insert([
        'email' => 'user@blogger.com',
        'password' => bcrypt('password'),
        'first_name' => 'Jack',
        'last_name' => 'Doe',
        'display_name' => 'Jack Doe',
      ]);
    }
}
