<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('class_id');
            $table->unsignedTinyInteger('class_num_of_session');
            $table->text('class_time');
            $table->char('class_gender_student', 1)->comment('M: male, F: female');
            $table->string('class_school_student');
            $table->string('class_academic_performance');
            $table->text('class_note');
            $table->char('class_gender_tutor', 1)->comment('M: male, F: female');
            $table->text('class_other_request');
            $table->tinyInteger('class_status');
            $table->string('class_tuition');
            $table->unsignedInteger('class_address');
            $table->unsignedTinyInteger('class_grade');
            $table->unsignedTinyInteger('class_level')->nullable();
            $table->unsignedInteger('class_tutor')->nullable();
            $table->unsignedInteger('class_parent');
            $table->timestamps();

            $table->foreign('class_address')->references('addr_id')->on('addresses')->onDelete('CASCADE');
            $table->foreign('class_grade')->references('grade_id')->on('grades')->onDelete('CASCADE');
            $table->foreign('class_level')->references('level_id')->on('levels')->onDelete('SET NULL');
            $table->foreign('class_tutor')->references('tt_id')->on('tutors')->onDelete('SET NULL');
            $table->foreign('class_parent')->references('pr_id')->on('parents')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
