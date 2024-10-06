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
            $table->string('tt_major');
            $table->string('tt_school');
            $table->text('tt_experiences')->nullable();
            $table->string('tt_avatar');
            $table->string('tt_degree');
            $table->tinyInteger('tt_status');
            $table->unsignedTinyInteger('level_id')->nullable();
            $table->unsignedTinyInteger('tuition_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('level_id')->references('level_id')->on('levels')->onDelete('SET NULL');
            $table->foreign('tuition_id')->references('tuition_id')->on('tuitions')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutors', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Xóa khóa ngoại
            $table->dropForeign(['level_id']);
            $table->dropForeign(['tuition_id']);
        });

        Schema::dropIfExists('tutors');
    }
};
