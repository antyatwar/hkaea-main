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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('org_name_en')->nullable();
            $table->string('org_name_cn')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->string('org_pic_name_en')->nullable();
            $table->string('org_pic_name_cn')->nullable();
            $table->string('org_pic_title')->nullable();
            $table->string('org_pic_email')->nullable();
            $table->string('org_pic_phone')->nullable();
            $table->string('org_pic_whatsapp')->nullable();
            $table->boolean('is_org_cp_same_as_org_pic')->nullable();
            $table->string('org_cp_name_en')->nullable();
            $table->string('org_cp_name_cn')->nullable();
            $table->string('org_cp_title')->nullable();
            $table->string('org_cp_email')->nullable();
            $table->string('org_cp_phone')->nullable();
            $table->string('org_cp_whatsapp')->nullable();
            $table->foreignId('organization_category_id')->nullable();
            $table->string('organization_category_other')->nullable();
            $table->string('document_type')->nullable();
            $table->json('documents')->nullable();
            $table->string('bsrn')->nullable();
            $table->string('fax')->nullable();
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
        Schema::dropIfExists('organizations');
    }
};
