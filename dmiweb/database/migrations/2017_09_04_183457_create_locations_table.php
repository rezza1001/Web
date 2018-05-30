<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_category_id')->unsigned()->index();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->mediumText('address')->nullable();
            $table->timestamps();
            $table->foreign('location_category_id')->references('id')->on('location_categories')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
        Schema::dropIfExists('location_brand');
    }
}
