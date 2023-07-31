<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('SKU',50);
            $table->string('name');
            $table->string('thumbnail')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('manufacturer_id');
            $table->text('description')->nullable();
            $table->text('specifications')->nullable();
            $table->bigInteger('sale_price');
            $table->bigInteger('import_price');
            $table->decimal('rating', 8, 2)->nullable();
            $table->string('ram',10)->nullable();
            $table->string('rom')->nullable();
            $table->integer('quantity');
            $table->tinyInteger('discount')->nullable();
            $table->integer('sold')->nullable();
            $table->foreign('category_id')->references('id')
            ->on('prd_category')->onDelete('cascade');
            $table->foreign('manufacturer_id')->references('id')
            ->on('manufacturer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
