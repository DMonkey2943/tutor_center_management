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
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('tt_id');
            $table->char('tt_gender', 1)->comment('M: male, F: female');
            $table->date('tt_birthday');
            $table->string('tt_address');
            $table->unsignedTinyInteger('level_id');
            $table->string('tt_major');
            $table->string('tt_school');
            $table->text('tt_achievements');
            $table->text('tt_experiences');
            $table->string('tt_avatar');
            $table->string('tt_degree');
            $table->unsignedTinyInteger('tuition_id')->nullable();
            $table->tinyInteger('tt_status');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('level_id')->references('level_id')->on('levels')->onDelete('CASCADE');
            $table->foreign('tuition_id')->references('tuition_id')->on('tuitions')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};
