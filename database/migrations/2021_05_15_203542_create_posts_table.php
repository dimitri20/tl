<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('title_ka');
            $table->string('slug_ka');
            $table->longText('content_ka');
            $table->string('title_en');
            $table->string('slug_en');
            $table->longText('content_en');
            $table->string('title_ru');
            $table->string('slug_ru');
            $table->longText('content_ru');
            $table->string('image_path');
            $table->string('files')->nullable();
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
