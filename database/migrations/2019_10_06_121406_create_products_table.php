<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->default(1);
            $table->string('name');
            $table->text('slug');
            $table->string('short_description');
            $table->text('description');
            $table->text('image');
            $table->integer('price');
            $table->string('unit');
            $table->integer('stock');
            $table->integer('weight');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
