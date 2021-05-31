<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globals', function (Blueprint $table) {
            // $table->text('about_team');
            // $table->string('phone_number');
            // $table->string('address');
            // $table->string('email_address');
            // $table->string('header_top_text_1');
            // $table->string('header_top_text_2');
            // $table->text('appearing_text_1');
            // $table->text('appearing_text_2');

            $table->id();
            $table->string('content_name');
            $table->text('content');
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
        Schema::dropIfExists('globals');
    }
}
