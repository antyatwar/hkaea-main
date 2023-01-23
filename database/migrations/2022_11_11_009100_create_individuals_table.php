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
        Schema::create('individuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('first_name_en')->nullable();
            $table->string('last_name_en')->nullable();
            $table->string('first_name_cn')->nullable();
            $table->string('last_name_cn')->nullable();
            $table->foreignId('gender_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->json('documents')->nullable();
            $table->foreignId('qualification_id')->nullable();
            $table->string('qualification_other')->nullable();
            $table->string('newsletter_other')->nullable();
            $table->boolean('is_volunteer')->nullable();
            $table->foreignId('survey_id')->nullable();
            $table->string('survey_other')->nullable();
            $table->text('comment')->nullable();
            $table->date('paid_at')->nullable();
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
        Schema::dropIfExists('individuals');
    }
};
