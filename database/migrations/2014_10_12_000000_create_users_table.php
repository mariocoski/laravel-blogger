<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->unsignedInteger('facebook_id')->nullable();
          $table->unsignedInteger('twitter_id')->nullable();
          $table->unsignedInteger('google_id')->nullable();
          $table->string('email')->unique();
          $table->string('password');
          $table->rememberToken();
          $table->string('first_name')->nullable();
          $table->string('last_name')->nullable();
          $table->string('display_name')->nullable();
          $table->string('address')->nullable();
          $table->string('postcode')->nullable();
          $table->string('town')->nullable();
          $table->string('country')->nullable();
          $table->string('phone')->nullable();
          $table->text('bio')->nullable();
          $table->string('job')->nullable();
          $table->datetime('date_of_birth')->nullable();
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
