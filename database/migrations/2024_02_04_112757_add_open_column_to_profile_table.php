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
        Schema::table('profile', function (Blueprint $table) {
            $table->string('open', 100)->after('information');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            if (Schema::hasColumn('profile', 'open')) {
                $table->dropColumn('open');
            }
        });
    }
};
