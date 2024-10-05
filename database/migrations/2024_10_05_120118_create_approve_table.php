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
        Schema::create('approve', function (Blueprint $table) {
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('tt_id');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->primary(['class_id', 'tt_id']);
            $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('CASCADE');
            $table->foreign('tt_id')->references('tt_id')->on('tutors')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approve');
    }
};
