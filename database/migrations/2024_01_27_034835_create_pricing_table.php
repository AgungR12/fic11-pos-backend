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
        Schema::create('pricing', function (Blueprint $table) {
            $table->id();
            $table->string('package_name', 200);
            $table->integer('price')->default(0);
            $table->enum('nominal', ['Ribu', 'Juta','Miliar','Triliun']);
            $table->string('warranty', 100)->default('0 bulan');
            $table->enum('status', ['active', 'not active']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing');
    }
};
