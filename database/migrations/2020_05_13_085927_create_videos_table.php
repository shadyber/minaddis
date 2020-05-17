<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('videoId')->unique();
            $table->string('title');
            $table->longText('detail');
            $table->bigInteger('category_id')->unsigned();
            $table->string('thumb_small');
            $table->string('thumb_big');
            $table->string('season')->nullable();
            $table->string('episode')->nullable();
            $table->string('casts')->nullable();
            $table->longText('iframe');
            $table->string('url')->unique();
            $table->integer('visit')->default(0);
            $table->string('tags')->nullable();
            $table->bigInteger('channels_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('videos');
    }
}
