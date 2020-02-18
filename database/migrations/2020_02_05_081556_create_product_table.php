<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->integer('quantity_instore');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('promotion_id');
            $table->decimal('price',15,0);
            $table->decimal('actual_price',15,0);
            $table->string('description');
            $table->string('parameter');
            $table->boolean('status')->default(0);
            $table->integer('guarantee');
            $table->string('image');
            $table->string('thumbail');
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('category');
            $table->foreign('origin_id')->references('origin_id')->on('origin');
            $table->foreign('promotion_id')->references('promotion_id')->on('promotion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
