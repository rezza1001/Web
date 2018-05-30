<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_years', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('options')->nullable();
            $table->timestamps();
        });
        Schema::create('product_year_product', function (Blueprint $table) {
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('product_year_id')->unsigned()->index();
            $table->foreign('product_year_id')->references('id')->on('product_years')->onDelete('cascade');
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
        Schema::dropIfExists('product_years');
        Schema::dropIfExists('product_year_product');
    }
}
