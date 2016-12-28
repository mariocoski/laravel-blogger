<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Can view and edit own profile',
            'permissions_level' => 1,
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'editor',
            'display_name' => 'Editor',
            'description' => 'Can view and edit own profile, can create/update articles',
            'permissions_level' => 2,
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Can view and edit own profile, can create/update/publish/delete articles, can create/update/delete users',
            'permissions_level' => 3,
        ]);

    }
}
