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
        Schema::create('description', function (Blueprint $table) {
            $table->id();
            $table->string('package_description', 255)->nullable();
            $table->enum('status', ['active', 'not active']);
            $table->string('package', 100)->nullable()->default('Semua Paket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('description');
    }
};
