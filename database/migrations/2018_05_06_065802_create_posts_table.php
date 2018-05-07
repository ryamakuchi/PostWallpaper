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
            $table->integer('pic_id');
            $table->string('title');
            $table->string('contributor')->nullable();
            $table->text('body')->nullable();
            $table->integer('category');
            $table->string('tag')->nullable();
            $table->string('fig_name');
            $table->string('fig_mime');
            $table->string('delete_key')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
