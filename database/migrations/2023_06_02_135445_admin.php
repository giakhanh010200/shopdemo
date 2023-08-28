<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('email',50);
            $table->text('avatar',200)->nullable();
            $table->string('phone_number',20)->nullable();
            $table->string('password',100);
            $table->string('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
