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
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->enum('day', ['Senin', 'Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu']);
            $table->enum('information', ['work', 'holiday'])->default('work');
            $table->enum('time_zone', ['WITA', 'WIB', 'WIT']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
};
