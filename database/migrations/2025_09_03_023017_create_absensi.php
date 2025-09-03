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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('jemaat_id')->references('id')->on('jemaat')->onDelete()->cascade();
            $table->bigInteger('acara_id')->references('id')->on('acara')->onDelete()->cascade();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
