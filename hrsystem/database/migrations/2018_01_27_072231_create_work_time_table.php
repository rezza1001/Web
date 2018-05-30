<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_time', function (Blueprint $table) {
            $table->increments('id');
            $table->time('work_start');
            $table->time('work_end');
            $table->datetime('exp_at')->default("9999-12-30 23:59:59");
            $table->string('note',150);
            $table->integer('max_late')->default(0);
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
        Schema::dropIfExists('work_time');
    }
}
