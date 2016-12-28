<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('settings')->truncate();
        DB::table('settings')->insert(['name' => 'meta_title']);
        DB::table('settings')->insert(['name' => 'meta_author']);
        DB::table('settings')->insert(['name' => 'meta_description']);
        DB::table('settings')->insert(['name' => 'meta_keywords']);
        DB::table('settings')->insert(['name' => 'meta_robots']);
        DB::table('settings')->insert(['name' => 'disqus_shortname']);
        DB::table('settings')->insert(['name' => 'google_analytics_id']);

    }

}
