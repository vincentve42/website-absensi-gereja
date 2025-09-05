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
        Schema::create('acara', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('nama_acara');
            $table->text('tanggal_acara');
            $table->integer('total_hadir')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acara');
    }
};
