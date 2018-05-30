<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSynDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syn_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('version_data')->default(0);
            $table->datetime('created_at')->default(now());
            $table->datetime('exp_at')->default('9999-12-30 23:59:59');
            $table->string('note',150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syn_data');
    }
}
