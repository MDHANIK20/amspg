<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bid');
            $table->string('fname');
            $table->date('dob');
            $table->string('mob');
            $table->string('state');
            $table->string('city');
            $table->string('add');
            $table->integer('rid');
            $table->integer('sno');
            $table->date('doj');
            $table->float('rent');
            $table->float('security');
            $table->string('adcno');
            $table->string('doctype');
            $table->string('idno');
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
        Schema::dropIfExists('user_details');
    }
}
