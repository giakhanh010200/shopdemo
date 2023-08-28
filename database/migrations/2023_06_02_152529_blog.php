<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('thumbnail');
            $table->string('title');
            $table->text('content');
            $table->unsignedInteger('category_id');
            $table->date('created_at');
            $table->date('updated_at');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')
            ->on('admin')->onDelete('cascade');
            $table->foreign('category_id')->references('id')
            ->on('blog_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog');
    }
}
