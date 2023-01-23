<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->json('description')->nullable();
            $table->json('process_title_1')->nullable();
            $table->date('process_date_1')->nullable();
            $table->string('process_image_1')->nullable();
            $table->json('process_title_2')->nullable();
            $table->date('process_date_2')->nullable();
            $table->string('process_image_2')->nullable();
            $table->json('process_title_3')->nullable();
            $table->date('process_date_3')->nullable();
            $table->string('process_image_3')->nullable();
            $table->json('process_title_4')->nullable();
            $table->date('process_date_4')->nullable();
            $table->string('process_image_4')->nullable();
            $table->json('painting_format')->nullable();
            $table->json('poster')->nullable();
            $table->json('age_groups')->nullable();
            $table->json('judging_criteria')->nullable();
            $table->json('prizes')->nullable();
            $table->json('payment_method')->nullable();
            $table->json('individual_application')->nullable();
            $table->json('group_application')->nullable();
            $table->json('other_details')->nullable();
            $table->json('terms')->nullable();
            $table->string('ceremony_image')->nullable();
            $table->json('ceremony_content')->nullable();
            $table->json('highlights')->nullable();
            $table->json('artworks')->nullable();
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
        Schema::dropIfExists('competitions');
    }
};
