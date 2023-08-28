<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('code',50);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_address')->nullable();
            $table->string('total_price');
            $table->date('payment_at');
            $table->unsignedBigInteger('voucher_id');
            $table->tinyInteger('status');
            $table->unsignedTinyInteger('payment_methods');
            $table->string('product_name');
            $table->string('product_price');
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')
            ->on('products')->onDelete('cascade');
            $table->foreign('voucher_id')->references('id')
            ->on('voucher')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
