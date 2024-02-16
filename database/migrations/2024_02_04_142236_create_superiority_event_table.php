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
        Schema::create('superiority_event', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 200)->nullable();
            $table->longText('description')->nullable();
            $table->enum('information', ['landing page', 'resto page']);
            $table->enum('status', ['active', 'not active']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_excellence');
    }
};
