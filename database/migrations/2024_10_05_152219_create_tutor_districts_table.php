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
        Schema::create('tutor_districts', function (Blueprint $table) {
             $table->unsignedInteger('tt_id');
            $table->unsignedTinyInteger('district_id');

            // $table->primary(['class_id', 'tutor_id']);
            $table->foreign('tt_id')->references('tt_id')->on('tutors')->onDelete('CASCADE');
            $table->foreign('district_id')->references('district_id')->on('districts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_districtss');
    }
};
