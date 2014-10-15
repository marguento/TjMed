<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbTable extends Migration {

    public function up()
    {
        Schema::create('facebook_users', function($table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('photo');
            $table->string('name');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('facebook_users');
    }

}