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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('chinese_name')->nullable();
            $table->string('english_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->foreignId('gender_id')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('parent_email')->nullable();
            // $table->foreignId('participant_category_id')->nullable();
            // $table->foreignId('country_id')->nullable();
            // $table->string('address')->nullable();
            // $table->string('instructor_name')->nullable();
            // $table->string('cheque_no')->nullable();
            // $table->date('paid_at')->nullable();
            // $table->boolean('is_paid')->default(false);
            // $table->string('receipt_no')->nullable();
            // $table->boolean('is_receipt_sent')->default(false);
            // $table->string('receipt_sent_by')->nullable();
            // $table->unsignedTinyInteger('artwork_count')->nullable();
            // $table->string('artwork_title')->nullable();
            // $table->text('artwork_description')->nullable();
            // $table->date('artwork_received_at')->nullable();
            // $table->unsignedTinyInteger('mark')->nullable();
            // $table->string('prize_details')->nullable();
            // $table->string('prize_shown')->nullable();
            // $table->string('artwork_selected')->nullable();
            // $table->boolean('is_cert_sent')->default(false);
            // $table->boolean('is_in_advance_award')->default(false);
            // $table->boolean('is_attend_ceremony')->default(false);
            // $table->unsignedTinyInteger('attendant_count')->nullable();
            // $table->string('attendant_name')->nullable();
            // $table->string('attendant_relation')->nullable();
            // $table->string('attendant_phone')->nullable();
            // $table->text('remark')->nullable();
            $table->morphs('participantable');
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
        Schema::dropIfExists('participants');
    }
};
