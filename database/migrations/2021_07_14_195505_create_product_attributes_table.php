<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('product_id')->nullable();
            $table->string('color')->nullable();
            $table->float('size')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_attributes');
    }
}
