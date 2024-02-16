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
        Schema::create('chef', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 200)->nullable();
            $table->string('work', 200);
            $table->string('twitter', 200)->nullable();
            $table->string('instagram', 200)->nullable();
            $table->enum('status', ['active', 'no active']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chef');
    }
};
