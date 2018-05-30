<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsenteeismTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absenteeism', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee');
            $table->integer('status');
            $table->date('work_date');
            $table->integer('work_day');
            $table->integer('work_month');
            $table->integer('work_year');
            $table->integer('work_time');
            $table->datetime('begin_time');
            $table->datetime('end_time');
            $table->text('note');
            $table->datetime('created_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absenteeism');
    }
}
