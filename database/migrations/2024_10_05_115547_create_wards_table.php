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
        Schema::create('wards', function (Blueprint $table) {
            $table->tinyIncrements('ward_id');
            $table->string('ward_name');
            $table->unsignedTinyInteger('district_id');

            $table->foreign('district_id')->references('district_id')->on('districts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wards', function (Blueprint $table) {
            $table->dropForeign(['district_id']); // Xóa khóa ngoại
        });

        Schema::dropIfExists('wards');
    }
};
