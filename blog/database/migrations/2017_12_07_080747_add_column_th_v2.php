<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnThV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trans_header', function (Blueprint $table) {
            $table->string('c_email', 30)->nullable();
            $table->string('c_name', 50)->nullable();
            $table->string('c_phone', 15)->nullable();
            $table->string('c_birth_date', 15)->nullable();
            $table->string('c_city', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trans_header', function (Blueprint $table) {

        });
    }
}
