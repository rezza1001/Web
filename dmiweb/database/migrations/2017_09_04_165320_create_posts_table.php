<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('keyword')->nullable();
            $table->string('type')->nullable();
            $table->string('video_id')->nullable();
            $table->string('video_url')->nullable();
            $table->mediumText('summary')->nullable();
            $table->longText('description')->nullable();
            $table->integer('status')->nullable();
            $table->integer('published')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('popular')->nullable();
            $table->integer('view')->nullable();
            $table->integer('like')->nullable();
            $table->integer('comments')->nullable();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
