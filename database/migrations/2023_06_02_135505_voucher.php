<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Voucher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code',100);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->tinyInteger('status');
            $table->date('created_at');
            $table->date('expired_date')->nullable();
            $table->integer('quantity')->nullable();

            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher');
    }
}
