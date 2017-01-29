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
        DB::table('settings')->insert(['name' => 'meta_title', 'value' => 'Blogger']);
        DB::table('settings')->insert(['name' => 'meta_author', 'value' => '']);
        DB::table('settings')->insert(['name' => 'meta_description', 'value' => 'Simple and elegant blog platform powered by Laravel']);
        DB::table('settings')->insert(['name' => 'meta_keywords', 'value' => 'laravel,blog,blogger,articles']);
        DB::table('settings')->insert(['name' => 'meta_robots', 'value' => '']);
        DB::table('settings')->insert(['name' => 'disqus_shortname', 'value' => '']);
        DB::table('settings')->insert(['name' => 'google_analytics_id', 'value' => '']);

    }

}
