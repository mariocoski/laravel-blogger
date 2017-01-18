<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('facebook_id')->unique()->unsigned()->nullable();
            $table->bigInteger('twitter_id')->unique()->unsigned()->nullable();
            $table->string('google_id')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('avatar')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('postcode')->nullable();
            $table->string('town')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->string('job')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('facebook_name')->nullable();
            $table->string('twitter_name')->nullable();
            $table->string('linked_in_name')->nullable();
            $table->string('github_name')->nullable();
            $table->string('website_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
