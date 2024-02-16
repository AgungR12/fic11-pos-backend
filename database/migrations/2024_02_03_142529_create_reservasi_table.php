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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 200)->nullable();
            $table->string('phone', 15);
            $table->string('early_time', 100);
            $table->string('end_time', 100);
            $table->string('date', 100);
            $table->longText('message')->nullable();
            $table->integer('people')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
