<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user');
            $table->string('name', 100);
            $table->integer('gender');
            $table->string('address',150);
            $table->string('phone',15);
            $table->string('alt_phone',15);
            $table->string('email',30);
            $table->date('dob');
            $table->string('npwp',20);
            $table->integer('organization');
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
        Schema::dropIfExists('employees');
    }
}
